<?php

use App\Http\Controllers\admin\ProjectController;
use App\Http\Controllers\admin\TaskController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProjectStatusController;
use App\Http\Controllers\TaskStatusController;
use Illuminate\Support\Facades\Route;



Route::get('/', [AuthenticationController::class, 'index'])->name('/sing');
Route::post('login/', [AuthenticationController::class, 'login'])->name('login');
Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');

Route::middleware(['Auth'])->group(function () {

    Route::get('dashboard/index/', [AuthenticationController::class, 'dashboard'])->name('dashboard/index');
    Route::get('dashboard/profile/', [AuthenticationController::class, 'profile'])->name('dashboard/profile');
    Route::get('/profile', [AuthenticationController::class, 'edit'])->name('profile.edit');
    Route::get('reset_password', [AuthenticationController::class, 'reset_password'])->name('reset_password');
    Route::post('/profile', [AuthenticationController::class, 'update'])->name('profile.update');
    Route::get('/register', [AuthenticationController::class, 'registe'])->name('registration');
    Route::post('/store', [AuthenticationController::class, 'store'])->name('store');
    Route::post('/password/update', [AuthenticationController::class, 'updatePassword'])->name('password.update.custom');


    Route::prefix('admin')->group(function () {
        Route::prefix('user')->group(function () {
            Route::get('index', [UserController::class, 'index'])->name('user.index');
            Route::get('create', [UserController::class, 'create'])->name('user.create');
            Route::post('store', [UserController::class, 'store'])->name('user.store');
            Route::get('/edit/{encodedId}', [UserController::class, 'edit'])->name('user.edit');
            Route::post('/update/{encodedId}', [UserController::class, 'update'])->name('user.update');
            Route::get('/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
            Route::post('/status/{id}', [UserController::class, 'status'])->name('user.status');
            Route::get('/restore/{id}', [UserController::class, 'restore'])->name('user.restore');
            Route::get('/trashed', [UserController::class, 'trashed'])->name('user.trashed');
            Route::delete('/permanentDelete/{id}', [UserController::class, 'permanentDelete'])->name('user.permanentDelete');

        });

Route::get('send-mail',[MailController::class,'sendEmail'])->name('sendEmail.index');



        Route::prefix('project')->group(function () {
            Route::get('index', [ProjectController::class, 'index'])->name('project.index');
            Route::get('create', [ProjectController::class, 'create'])->name('project.create');
            Route::post('store', [ProjectController::class, 'store'])->name('project.store');
            Route::get('/edit/{encodedId}', [ProjectController::class, 'edit'])->name('project.edit');
            Route::post('/update/{encodedId}', [ProjectController::class, 'update'])->name('project.update');
            Route::get('/delete/{id}', [ProjectController::class, 'delete'])->name('project.delete');
            Route::post('/status/{id}', [ProjectController::class, 'status'])->name('project.status');

        });
        Route::prefix('Task')->group(function () {
            Route::get('index', [TaskController::class, 'index'])->name('task.index');
            Route::get('create', [TaskController::class, 'create'])->name('task.create');
            Route::post('store', [TaskController::class, 'store'])->name('task.store');
            Route::get('/edit/{encodedId}', [TaskController::class, 'edit'])->name('task.edit');
            Route::post('/update/{encodedId}', [TaskController::class, 'update'])->name('task.update');
            Route::get('/delete/{id}', [TaskController::class, 'delete'])->name('task.delete');
            Route::post('/status/{id}', [TaskController::class, 'status'])->name('task.status');
            Route::get('/task/{encodedId}/view', [TaskController::class, 'show'])->name('task.show');

        });
        Route::prefix('task-status')->group(function () {
            Route::get('/', [TaskStatusController::class, 'index'])->name('task-status.index');
            Route::get('/create', [TaskStatusController::class, 'create'])->name('task-status.create');
            Route::post('/', [TaskStatusController::class, 'store'])->name('task-status.store');
            Route::get('/{id}/edit', [TaskStatusController::class, 'edit'])->name('task-status.edit');
            Route::post('/{id}', [TaskStatusController::class, 'update'])->name('task-status.update');
            Route::get('/{id}', [TaskStatusController::class, 'destroy'])->name('task-status.destroy');
        });
        Route::prefix('project-status')->group(function () {
            Route::get('/', [ProjectStatusController::class, 'index'])->name('project-status.index');
            Route::get('/create', [ProjectStatusController::class, 'create'])->name('project-status.create');
            Route::post('/', [ProjectStatusController::class, 'store'])->name('project-status.store');
            Route::get('/{id}/edit', [ProjectStatusController::class, 'edit'])->name('project-status.edit');
            Route::post('/{id}', [ProjectStatusController::class, 'update'])->name('project-status.update');
            Route::get('/{id}', [ProjectStatusController::class, 'destroy'])->name('project-status.destroy');
        });
          
    });
});

Route::fallback(function () {
    return view('admin.error.404page');
});
