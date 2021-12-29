<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'gender',
        'password',
        'yearbirth',
        'user_id'
    ];

    public function programs(){
        return $this->belongsToMany(Program::class);
    }

    public function lastProgram(){
        return $this->programs()->orderby('id','desc')->where('user_id',$this->user_id)->first();
    }
}
