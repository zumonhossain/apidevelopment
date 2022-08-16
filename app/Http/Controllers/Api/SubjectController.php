<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use Validator;
use Exception;
use Carbon\Carbon;


class SubjectController extends Controller{
    public function index(){
        $allSubject = Subject::get();
        return response()->json(['success' => 'true', 'status_code' => '200', 'data' => $allSubject]);
    }

    public function viewSubject($id){
        $viewSubject = Subject::where('id',$id)->firstOrFail();
        return response()->json(['success' => 'true', 'status_code' => '200', 'data' => $viewSubject]);
    }

    public function saveSubject(Request $request){

        $validator = Validator::make($request->all(), [
            'class_id' => 'required',
            'subject_name' => 'required|unique:subjects|max:25',
            'subject_code' => 'required|unique:subjects|max:25',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => 'false', 'status_code' => '401', 'error' => 'error', 'message' => $validator->errors()]);
        }

        try {

            $subject = Subject::insertGetId([
                'class_id' => $request['class_id'],
                'subject_name' => $request['subject_name'],
                'subject_code' => $request['subject_code'],
                'created_at' => Carbon::now()
            ]);

            return response()->json(['success' => 'true', 'status_code' => '200', 'data' => $subject]);
        }
        catch (Exception $ex) {
            return response()->json(['success' => 'false', 'status_code' => '500', 'message' => $ex->getMessage(), 'error' => 'error']);
        }
    }

    public function updateSubject(Request $request, $id){

        $validator = Validator::make($request->all(), [
            'class_id' => 'required',
            'subject_name' => 'required|unique:subjects|max:25',
            'subject_code' => 'required|unique:subjects|max:25',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => 'false', 'status_code' => '401', 'error' => 'error', 'message' => $validator->errors()]);
        }

        try {

            $subject = Subject::where('id', $id)->update([
                'class_id' => $request['class_id'],
                'subject_name' => $request['subject_name'],
                'subject_code' => $request['subject_code'],
                'updated_at' => Carbon::now()
            ]);

            return response()->json(['success' => 'true', 'status_code' => '200', 'data' => $subject]);
        }
        catch (Exception $ex) {
            return response()->json(['success' => 'false', 'status_code' => '500', 'message' => $ex->getMessage(), 'error' => 'error']);
        }
    }

    
}
