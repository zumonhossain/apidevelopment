<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;


class SubjectController extends Controller{
    public function index(){
        $allSubject = Subject::get();
        return response()->json(['success' => 'true', 'status_code' => '200', 'data' => $allSubject]);
    }

    public function viewSubject($id){
        $viewSubject = Subject::where('id',$id)->firstOrFail();
        return response()->json(['success' => 'true', 'status_code' => '200', 'data' => $viewSubject]);
    }
}
