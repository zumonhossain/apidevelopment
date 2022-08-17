<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Student;
use Validator;
use Exception;
use Carbon\Carbon;

class StudentController extends Controller{
    public function index(){
        $allStudent = Student::get();
        return response()->json(['success' => 'true', 'status_code' => '200', 'data' => $allStudent]);
    }


}
