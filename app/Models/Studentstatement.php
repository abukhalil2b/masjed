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
        return $this->belongsToMany(User::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
