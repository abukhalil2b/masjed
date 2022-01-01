<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Msjedstatement extends Model
{
    use HasFactory;

    public function userHasMsjedstatementPermission(){
        return $this->belongsToMany(User::class);
    }

    protected $fillable=[
        'amount',
        'user_id',
        'status',
        'description'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
