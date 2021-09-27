<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Nette\Utils\Json;
use PhpParser\Node\Expr\PostDec;

//*Dev Mode Only
// use Debugbar;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Student $student)
    {
        $students = Student::all();

        //*DebugBar
        // DebugBar::info($students);

        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'phone' => ['required'],
            'course' => ['required'],
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()->toArray(),
            ]);
        } else {

            $values = [
                'name' => $request->name,
                'phone' => $request->phone,
                'course' => $request->course
            ];

            $query = Student::create($values);

            if ($query) {
                return response()->json([
                    'status' => 200,
                    'success' => 'student added successfully'
                ]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);

        return response()->json([
            'student' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id)->first();

        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'phone' => ['required'],
            'course' => ['required'],
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()->toArray(),
            ]);
        } else {

            $student->name = $request->name;
            $student->phone = $request->phone;
            $student->course = $request->course;
            $student->save();

            if ($student) {
                return response()->json([
                    'status' => 200,
                    'success' => 'student added successfully'
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);

        $student->delete();

        return response()->json([
            'success' => 'Student Deleted Successfully'
        ]);
    }
}
