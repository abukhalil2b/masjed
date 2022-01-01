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
	Route::get('index',[TaskController::class,'index'])->name('task.index');
	Route::get('create',[TaskController::class,'create'])->name('task.create');
	Route::post('{task}/update',[TaskController::class,'update'])->name('task.update');
	Route::post('store',[TaskController::class,'store'])->name('task.store');
});

Route::prefix('program')->group(function(){
	Route::get('{program}/show',[ProgramController::class,'show'])->name('program.show');
	Route::get('{program}/edit',[ProgramController::class,'edit'])->name('program.edit');
	Route::get('index',[ProgramController::class,'index'])->name('program.index');
	Route::get('create',[ProgramController::class,'create'])->name('program.create');
	Route::post('{program}/update',[ProgramController::class,'update'])->name('program.update');
	Route::post('store',[ProgramController::class,'store'])->name('program.store');
	Route::get('{program}/destroy',[ProgramController::class,'destroy'])->name('program.destroy');

	Route::get('{program}/transfer/create',[ProgramController::class,'programTransferCreate'])->name('program.transfer.create');
	Route::post('{program}/transfer/store',[ProgramController::class,'programTransferStore'])->name('program.transfer.store');

	Route::get('{program}/task/create',[ProgramController::class,'programTaskCreate'])->name('program.task.create');
	Route::post('{program}/task/store',[ProgramController::class,'programTaskStore'])->name('program.task.store');

	Route::get('{program}/student/create',[ProgramController::class,'programStudentCreate'])->name('program.student.create');
	Route::post('{program}/student/store',[ProgramController::class,'programStudentStore'])->name('program.student.store');
});

Route::prefix('user')->group(function () {
	// user type - masjed
	Route::get('masjed/{masjed}/edit',[UserController::class,'masjedEdit'])->name('user.masjed.edit');
	Route::get('masjed/{masjed}/show',[UserController::class,'masjedShow'])->name('user.masjed.show');
	Route::get('masjed/index',[UserController::class,'masjedIndex'])->name('user.masjed.index');
	Route::get('masjed/create',[UserController::class,'masjedCreate'])->name('user.masjed.create');
	Route::post('masjed/store', [UserController::class,'masjedStore'])->name('user.masjed.store');
	Route::post('masjed/{masjed}/update', [UserController::class,'masjedUpdate'])->name('user.masjed.update');

	// user type - teacher
	Route::get('teacher/dashboard',[UserController::class,'teacherDashboard'])->name('user.teacher.dashboard');
	Route::get('teacher/create',[UserController::class,'teacherCreate'])->name('user.teacher.create');
	Route::post('teacher/store', [UserController::class,'teacherStore'])->name('user.teacher.store');

	// user permission 
	Route::get('permissions/index/{user}',[PermissionController::class,'index'])->name('user.permissions.index');
	Route::post('permissions/update/{user}',[PermissionController::class,'update'])->name('user.permissions.update');
});

Route::prefix('student')->group(function () {
	Route::get('{student}/show',[StudentController::class,'show'])->name('student.show');
	Route::get('{student}/edit',[StudentController::class,'edit'])->name('student.edit');
	Route::post('{student}/update',[StudentController::class,'update'])->name('student.update');
	Route::get('create',[StudentController::class,'create'])->name('student.create');
	Route::get('male_index',[StudentController::class,'maleIndex'])->name('student.male_index');
	Route::get('female_index',[StudentController::class,'femaleIndex'])->name('student.female_index');
	Route::post('store', [StudentController::class,'store'])->name('student.store');
	Route::post('mark/store', [StudentController::class,'studentPointStore'])->name('student.point.store');
});

Route::prefix('studentstatement')->middleware('userPermission:studentstatement')->group(function () {
	Route::get('index',[StudentstatementController::class,'index'])->name('studentstatement.index');
	Route::get('{studentstatement}/edit',[StudentstatementController::class,'edit'])->name('studentstatement.edit');
	Route::get('{studentstatement}/delete',[StudentstatementController::class,'destroy'])->name('studentstatement.delete');
	Route::post('{studentstatement}/update',[StudentstatementController::class,'update'])->name('studentstatement.update');
	Route::post('store', [StudentstatementController::class,'store'])->name('studentstatement.store');
});

Route::prefix('msjedstatement')->group(function () {
	Route::get('index',[MsjedstatementController::class,'index'])->name('msjedstatement.index');
	Route::get('{msjedstatement}/edit',[MsjedstatementController::class,'edit'])->name('msjedstatement.edit');
	Route::get('{msjedstatement}/delete',[MsjedstatementController::class,'destroy'])->name('msjedstatement.delete');
	Route::post('{msjedstatement}/update',[MsjedstatementController::class,'update'])->name('msjedstatement.update');
	Route::post('store', [MsjedstatementController::class,'store'])->name('msjedstatement.store');
});



