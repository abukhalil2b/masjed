<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'maxpoint',
        'description'
    ];

    public function programs(){
        return $this->belongsToMany(Program::class);
    }
}
