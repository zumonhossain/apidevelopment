<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentClassController;
use App\Http\Controllers\Api\SubjectController;
use App\Http\Controllers\Api\SectionController;

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




// Student Class
Route::get('/student/class', [StudentClassController::class, 'index']);
Route::get('/view/student/class/{id}', [StudentClassController::class, 'viewStudentClass']);
Route::post('/save/student/class', [StudentClassController::class, 'saveStudentClass']);
Route::post('/update/student/class/{id}', [StudentClassController::class, 'updateStudentClass']);
Route::get('/delete/student/class/{id}', [StudentClassController::class, 'deleteStudentClass']);


// Subject
Route::get('/subject', [SubjectController::class, 'index']);
Route::get('/view/subject/{id}', [SubjectController::class, 'viewSubject']);
Route::post('/save/subject', [SubjectController::class, 'saveSubject']);
Route::post('/update/subject/{id}', [SubjectController::class, 'updateSubject']);
Route::get('/delete/subject/{id}', [SubjectController::class, 'deleteSubject']);



// Section
Route::get('/section', [SectionController::class, 'index']);







