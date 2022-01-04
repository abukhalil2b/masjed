<?php
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\StudentstatementController;
use App\Http\Controllers\MsjedstatementController;
use Illuminate\Support\Facades\Route;


Route::get('/',function(){return view('welcome');})->name('welcome');
Route::get('login',function(){return view('auth.login');})->name('login')->middleware('guest');
Route::get('dashboard',[HomeController::class,'dashboard'])->name('dashboard');

Route::prefix('task')->group(function(){
	Route::get('{task}/show',[TaskController::class,'show'])->name('task.show');
	Route::get('{task}/edit',[TaskController::class,'edit'])->name('task.edit');

	Route::get('index',[TaskController::class,'index'])
	->middleware('userPermission:task_show')
	->name('task.index');

	Route::get('create',[TaskController::class,'create'])
	->middleware('userPermission:task_create_edit')
	->name('task.create');

	Route::post('{task}/update',[TaskController::class,'update'])->name('task.update');
	Route::post('store',[TaskController::class,'store'])->name('task.store');
});

Route::prefix('program')->group(function(){
	Route::get('{program}/show',[ProgramController::class,'show'])
	->middleware('userPermission:program_show')
	->name('program.show');

	Route::get('{program}/edit',[ProgramController::class,'edit'])
	->middleware('userPermission:program_create_edit')
	->name('program.edit');

	Route::get('index',[ProgramController::class,'index'])
	->middleware('userPermission:program_show')
	->name('program.index');

	Route::get('create',[ProgramController::class,'create'])->name('program.create');
	Route::post('{program}/update',[ProgramController::class,'update'])->name('program.update');

	Route::post('store',[ProgramController::class,'store'])
	->name('program.store');

	Route::get('{program}/destroy',[ProgramController::class,'destroy'])
	->middleware('userPermission:program_destroy')
	->name('program.destroy');

	Route::get('{program}/task/create',[ProgramController::class,'programTaskCreate'])
	->middleware('userPermission:program_task_create_edit')
	->name('program.task.create');

	Route::post('{program}/task/store',[ProgramController::class,'programTaskStore'])->name('program.task.store');

	Route::get('{program}/student_create',[ProgramController::class,'programStudentCreate'])
	->middleware('userPermission:program_student_create_edit')
	->name('program.student.create');

	Route::post('{program}/student_store',[ProgramController::class,'programStudentStore'])
	->middleware('userPermission:program_student_create_edit')
	->name('program.student.store');
});

Route::prefix('user')->group(function () {
	// user account index
	Route::get('profile',[UserController::class,'userProfile'])
	->name('user.profile');

	Route::post('user/update_password',[UserController::class,'updatePassword'])
	->name('user.update_password');

	Route::get('shift_to_account/{account}',[UserController::class,'shiftToAccount'])
	->name('user.shift_to_account');

	Route::get('index',[UserController::class,'userIndex'])
	->middleware('userPermission:manage_user_account')
	->name('user.index');


	// user type - masjed
	Route::get('masjed/{masjed}/edit',[UserController::class,'masjedEdit'])->name('user.masjed.edit');
	Route::get('masjed/{masjed}/show',[UserController::class,'masjedShow'])->name('user.masjed.show');
	Route::get('masjed/index',[UserController::class,'masjedIndex'])->name('user.masjed.index');
	Route::get('masjed/create',[UserController::class,'masjedCreate'])->name('user.masjed.create');
	Route::post('masjed/store', [UserController::class,'masjedStore'])->name('user.masjed.store');
	Route::post('masjed/{masjed}/update', [UserController::class,'masjedUpdate'])->name('user.masjed.update');

	// user type - teacher
	Route::get('teacher/dashboard',[UserController::class,'teacherDashboard'])
	->middleware('userPermission:manage_user_account')
	->name('user.teacher.dashboard');

	Route::get('teacher/create',[UserController::class,'teacherCreate'])
	->middleware('userPermission:manage_user_account')
	->name('user.teacher.create');

	Route::get('teacher/new/create',[UserController::class,'teacherNewCreate'])
	->middleware('userPermission:manage_user_account')
	->name('user.teacher.new.create');

	Route::post('teacher/store', [UserController::class,'teacherStore'])
	->middleware('userPermission:manage_user_account')
	->name('user.teacher.store');

	Route::post('teacher/new/store', [UserController::class,'teacherNewStore'])
	->middleware('userPermission:manage_user_account')
	->name('user.teacher.new.store');

	// user type - wakeel
	Route::get('wakeel/dashboard',[UserController::class,'wakeelDashboard'])->name('user.wakeel.dashboard');
	Route::get('wakeel/create',[UserController::class,'wakeelCreate'])->name('user.wakeel.create');
	Route::get('wakeel/new/create',[UserController::class,'wakeelNewCreate'])->name('user.wakeel.new.create');
	Route::post('wakeel/store', [UserController::class,'wakeelStore'])->name('user.wakeel.store');
	Route::post('wakeel/new/store', [UserController::class,'wakeelNewStore'])->name('user.wakeel.new.store');

	//delete account
	Route::get('{user}/show_delete_form',[UserController::class,'useraccountShowDeleteFrom'])
	->middleware('userPermission:manage_user_account')
	->name('useraccount.show_delete_form');

	Route::get('{user}/confirm_user_disable',[UserController::class,'useraccountConfirmUserDisable'])
	->middleware('userPermission:manage_user_account')
	->name('useraccount.confirm_user_disable');

	Route::get('{user}/confirm_user_enable',[UserController::class,'useraccountConfirmUserEnable'])
	->middleware('userPermission:manage_user_account')
	->name('useraccount.confirm_user_enable');

	Route::get('{user}/confirm/{account}/delete',[UserController::class,'useraccountConfirmAccountDelete'])
	->middleware('userPermission:manage_user_account')
	->name('useraccount.confirm_account_delete');
	
	// user permission 
	Route::get('permissions/index/{user}',[PermissionController::class,'index'])->name('user.permissions.index');
	Route::post('permissions/update/{user}',[PermissionController::class,'update'])->name('user.permissions.update');

});

Route::prefix('student')->group(function () {
	Route::get('{student}/show',[StudentController::class,'show'])->name('student.show');
	Route::get('{student}/edit',[StudentController::class,'edit'])->name('student.edit');
	Route::post('{student}/update',[StudentController::class,'update'])->name('student.update');

	Route::get('create',[StudentController::class,'create'])
	->middleware('userPermission:student_create_edit')
	->name('student.create');

	Route::get('male_index',[StudentController::class,'maleIndex'])
	->middleware('userPermission:student_show_male')
	->name('student.male_index');

	Route::get('female_index',[StudentController::class,'femaleIndex'])
	->middleware('userPermission:student_show_female')
	->name('student.female_index');

	Route::post('store', [StudentController::class,'store'])
	->middleware('userPermission:student_create_edit')
	->name('student.store');

	Route::post('mark/store', [StudentController::class,'studentPointStore'])->name('student.point.store');
});

Route::prefix('studentstatement')->group(function () {

	Route::get('index',[StudentstatementController::class,'index'])
	->middleware('userPermission:manage_studentstatement')
	->name('studentstatement.index');

	Route::get('{studentstatement}/edit',[StudentstatementController::class,'edit'])
	->middleware('userPermission:manage_studentstatement')
	->name('studentstatement.edit');
	
	Route::get('{studentstatement}/delete',[StudentstatementController::class,'destroy'])
	->middleware('userPermission:manage_studentstatement')
	->name('studentstatement.delete');
	
	Route::post('{studentstatement}/update',[StudentstatementController::class,'update'])
	->middleware('userPermission:manage_studentstatement')
	->name('studentstatement.update');
	
	Route::post('store', [StudentstatementController::class,'store'])
	->middleware('userPermission:manage_studentstatement')
	->name('studentstatement.store');
});


Route::prefix('msjedstatement')
	->middleware('userPermission:manage_msjedstatement')
	->group(function () {

	Route::get('index',[MsjedstatementController::class,'index'])
	->name('msjedstatement.index');

	Route::get('{msjedstatement}/edit',[MsjedstatementController::class,'edit'])
	->name('msjedstatement.edit');

	Route::get('{msjedstatement}/delete',[MsjedstatementController::class,'destroy'])
	->name('msjedstatement.delete');

	Route::post('{msjedstatement}/update',[MsjedstatementController::class,'update'])
	->name('msjedstatement.update');

	Route::post('store', [MsjedstatementController::class,'store'])
	->name('msjedstatement.store');

});



