<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';

    protected $guarded = [];

    public function getCreatedAtAttribute($val)
    {
        $carbonDate = new Carbon($val);
        return $carbonDate->diffForHumans();
    }
    public function getUpdatedAtAttribute($val)
    {
        $carbonDate = new Carbon($val);
        return $carbonDate->diffForHumans();
    }
}
