<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;


    protected $fillable = [
        'name',
        'gender',
        'email',
        'password',
        'userType',
        'phone',
        'active',
        'parent',
        'accounts'
    ];


    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    protected $appends = [
        'profile_photo_url',
    ];

    public function isActive(){
        return $this->active;
    }

    public function active(){
        return $this->update(['active'=>1]);
    }

    public function deactive(){
        return $this->update(['active'=>0]);
    }

    public function users(){
        return $this->hasMany(User::class,'parent');
    }

    public function parentUser(){
        return $this->belongsTo(User::class,'parent');
    }

    public function programs(){
        return $this->hasMany(Program::class);
    }

    public function teachers(){
        return $this->hasMany(Teacher::class);
    }

    public function students(){
        return $this->hasMany(Student::class);
    }

    public function msjedstatements(){
        return $this->hasMany(Msjedstatement::class);
    }

    public function studentstatements(){
        return $this->hasMany(Studentstatement::class);
    }
    
    public function userHasMsjedstatementPermission(){
        return $this->belongsToMany(Msjedstatement::class);
    }

    public function userHasStudentstatementPermission(){
        return $this->belongsToMany(Studentstatement::class);
    }

    public function checkUserHasStudentstatementPermission($studentstatement){
        $studentstatement = $this->userHasStudentstatementPermission()
        ->where(['studentstatement_id'=>$studentstatement->id,'user_id'=>$this->id])
        ->first();
        if(!$studentstatement){
            abort(401);
        }
    }

    public function roles() {
        return $this->belongsToMany(Role::class, 'user_role', 'user_id', 'role_id');
    }

    public function permissions() {
        return $this->belongsToMany(Permission::class, 'user_permission', 'user_id', 'permission_id');
    }

    public function canPermission($slug) {
        if($this->id===1)return true;
        return (bool) $this->permissions()->where('slug', $slug)->count();
    }

    public function checkUserHasUserPermission($user){
        $wakeel = $this->users()->whereId($user->id)->first();
        if(!$wakeel){
            abort(401);
        }
    }

}
