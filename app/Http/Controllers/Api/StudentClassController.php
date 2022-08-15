<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;
use DB;

class StudentClassController extends Controller{
    public function index(){
        //return StudentClass::all();

        $studentClass = DB::table('student_classes')->get();
        return response()->json($studentClass);
    }
}
