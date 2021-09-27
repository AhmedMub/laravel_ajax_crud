@extends('layouts.master')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables</a>.</p>

    <div class="messages">
        <p class="ds-none des_msg alert alert-warning"></p>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createStudent">Add Student</button>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered std-tbl" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Course</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Controles</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Course</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Controles</th>
              </tr>
            </tfoot>
            <tbody>
                @if (count($students) > 0)
                    @foreach ($students as $std)
                        <tr>
                            <td> {{$std->id}} </td>
                            <td> {{$std->name}} </td>
                            <td> {{$std->phone}} </td>
                            <td> {{$std->course}} </td>
                            <td> {{$std->created_at}} </td>
                            <td> {{$std->updated_at}} </td>
                            <td>
                                <a href=' {{route('ajax.edit', $std->id)}} ' class='btn btn-warning updateStudent' data-toggle="modal" data-target="#updateStudent">Edit</a>

                                {!! Form::open([ 'method'=>'delete', 'route'=>['ajax.destroy', $std->id], 'class'=>'d-inline delete_form']) !!}
                                {!! Form::hidden('id', $std->id, ['class'=>'std_ID']) !!}
                                {!! Form::submit('Delete', ['class'=>'btn btn-danger std_submit']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
          </table>
          <div class="ds-none empty-table"></div>
        </div>
      </div>
    </div>

  </div>

  <form action="" class="tstform"></form>

  <x-create-student/>

  @include('students.edit_std')
  <!-- /.container-fluid -->
@endsection
