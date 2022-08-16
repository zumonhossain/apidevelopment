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

}
