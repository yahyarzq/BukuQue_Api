<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BooksController;
use App\Http\Controllers\Api\TeacherController;
use App\Http\Controllers\Api\StudentsController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('books', BooksController::class, ['as' => 'api']);
Route::apiResource('teacher', TeacherController::class, ['as' => 'api']);
Route::apiResource('students', StudentsController::class, ['as' => 'api']);


Route::post('teacher/login', 'App\Http\Controllers\Api\TeacherController@teacherLogin',['as' => 'api']);
Route::post('teacher/teacherData', 'App\Http\Controllers\Api\TeacherController@teacherData',['as' => 'api']);
Route::post('teacher/teacherClassList', 'App\Http\Controllers\Api\TeacherController@teacherClassList',['as' => 'api']);
Route::post('teacher/teacherClassStudentList', 'App\Http\Controllers\Api\TeacherController@teacherClassStudentList',['as' => 'api']);
Route::post('teacher/teacherClassStudentDataList', 'App\Http\Controllers\Api\TeacherController@teacherClassStudentDataList',['as' => 'api']);


Route::post('students/login', 'App\Http\Controllers\Api\StudentsController@studentsLogin',['as' => 'api']);
Route::post('students/studentsData', 'App\Http\Controllers\Api\StudentsController@studentsData',['as' => 'api']);


Route::post('books/studentsBooksSubmit', 'App\Http\Controllers\Api\BooksController@studentsBooksSubmit',['as' => 'api']);
