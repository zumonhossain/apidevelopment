<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use Validator;
use Exception;
use Carbon\Carbon;

class SectionController extends Controller{
    public function index(){
        $allSection = Section::get();
        return response()->json(['success' => 'true', 'status_code' => '200', 'data' => $allSection]);
    }

    public function viewSection($id){
        $viewSection = Section::where('id',$id)->firstOrFail();
        return response()->json(['success' => 'true', 'status_code' => '200', 'data' => $viewSection]);
    }

    public function saveSection(Request $request){

        $validator = Validator::make($request->all(), [
            'class_id' => 'required',
            'section_name' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => 'false', 'status_code' => '401', 'error' => 'error', 'message' => $validator->errors()]);
        }

        try {

            $section = Section::insertGetId([
                'class_id' => $request['class_id'],
                'section_name' => $request['section_name'],
                'created_at' => Carbon::now()
            ]);

            return response()->json(['success' => 'true', 'status_code' => '200', 'data' => $section]);
        }
        catch (Exception $ex) {
            return response()->json(['success' => 'false', 'status_code' => '500', 'message' => $ex->getMessage(), 'error' => 'error']);
        }
    }

    public function updateSection(Request $request, $id){

        $validator = Validator::make($request->all(), [
            'class_id' => 'required',
            'section_name' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => 'false', 'status_code' => '401', 'error' => 'error', 'message' => $validator->errors()]);
        }

        try {

            $section = Section::where('id', $id)->update([
                'class_id' => $request['class_id'],
                'section_name' => $request['section_name'],
                'updated_at' => Carbon::now()
            ]);

            return response()->json(['success' => 'true', 'status_code' => '200', 'data' => $section]);
        }
        catch (Exception $ex) {
            return response()->json(['success' => 'false', 'status_code' => '500', 'message' => $ex->getMessage(), 'error' => 'error']);
        }
    }

    public function deleteSection($id){
        $delete = Section::where('id',$id)->delete();
        return response()->json(['success' => 'true', 'status_code' => '200', 'data' => $delete]);
    }
}
