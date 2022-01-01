<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'start_at',
        'end_at',
        'status',
        'user_id',
    ];

    public function students(){
        return $this->belongsToMany(Student::class);
    }

    public function tasks(){
        return $this->belongsToMany(Task::class);
    }


    public function masjed(){
        return $this->belongsTo(User::class,'user_id');
    }
}
