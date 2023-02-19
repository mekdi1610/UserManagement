<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController; 
use App\Http\Controllers\DepartmentController; 
use App\Http\Controllers\UserDepartmentController;
use App\Models\user_department;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('api')->group(function () {
    Route::resource('users', UserController::class);
});


Route::middleware('api')->group(function () {
    Route::resource('departments', DepartmentController::class);
});

Route::middleware('api')->group(function () {
    Route::resource('assignments', UserDepartmentController::class);
});

 Route::get('/assignmentswithPivot',[UserDepartmentController:: class, 'getAssignment']);
 Route::get('/getAssignmentByID/{id}',[UserDepartmentController:: class, 'getAssignmentByID']);
 Route::get('/checkAssignment/{user_id}/{department_id}',[UserDepartmentController:: class, 'checkAssignment']);
 