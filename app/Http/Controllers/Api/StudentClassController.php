<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\CompanyInfoService;
use Illuminate\Http\Request;
use App\Models\StudentClass;
use Validator;
use Exception;
use DB;

class StudentClassController extends Controller{
    public function index(){

       return StudentClass::all();

        // $studentClass = DB::table('student_classes')->get();
        // return response()->json($studentClass);
    }


    public function saveStudentClass(Request $request){
        
        $validator = Validator::make($request->all(), [
            'class_name' => 'required|unique:student_classes|max:25'

        ]);

        if ($validator->fails()) {
            return response()->json(['success' => 'false', 'status_code' => '401', 'error' => 'error', 'message' => $validator->errors()]);
        }

        try {

            $studentClass = StudentClass::insertGetId([
                'class_name' => $request['class_name']
            ]);

            return response()->json(['success' => 'true', 'status_code' => '200', 'data' => $studentClass]);
        }
        catch (Exception $ex) {
            return response()->json(['success' => 'false', 'status_code' => '500', 'message' => $ex->getMessage(), 'error' => 'error']);
        }
    }
}
