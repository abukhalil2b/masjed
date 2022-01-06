<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studentstatement extends Model
{
    use HasFactory;
    protected $fillable=[
        'amount',
        'user_id',
        'status',
        'description'
    ];


    public function userHasStudentstatementPermission(){
        return $this->belongsToMany(User::class,'user_has_studentstatement_permission','studentstatement_id','user_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
