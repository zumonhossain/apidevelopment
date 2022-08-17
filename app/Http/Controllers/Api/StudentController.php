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

    public function viewStudent($id){
        $viewStudent = Student::where('id',$id)->firstOrFail();
        return response()->json(['success' => 'true', 'status_code' => '200', 'data' => $viewStudent]);
    }

    public function saveStudent(Request $request){

        $validator = Validator::make($request->all(), [
            'class_id' => 'required',
            'section_id' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'required',
            'photo' => 'required',
            'address' => 'required',
            'gender' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => 'false', 'status_code' => '401', 'error' => 'error', 'message' => $validator->errors()]);
        }

        try {

            $section = Student::insertGetId([
                'class_id' => $request['class_id'],
                'section_id' => $request['section_id'],
                'name' => $request['name'],
                'phone' => $request['phone'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'photo' => $request['photo'],
                'address' => $request['address'],
                'gender' => $request['gender'],
                'created_at' => Carbon::now()
            ]);

            return response()->json(['success' => 'true', 'status_code' => '200', 'data' => $section]);
        }
        catch (Exception $ex) {
            return response()->json(['success' => 'false', 'status_code' => '500', 'message' => $ex->getMessage(), 'error' => 'error']);
        }
    }


}
