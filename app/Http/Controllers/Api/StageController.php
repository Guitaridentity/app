<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\General;
use App\Apiquery;


class StageController extends Controller
{
    public function stage(Request $request){
    	if(isset($request->user_id)){
            $a = new Apiquery;
            $basedata = $a->basedata($request->user_id);
        	return response()->json([
        		'status' => 'ok',
        		'basedata' => $basedata
        	]);
    	} else {
    		return response()->json(['error' => '2001']);
    	}
    }
}
