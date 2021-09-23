<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\General;
use App\Apiquery;
use App\Models\UserDetail;
use App\Models\UserProfession;
use App\Models\UserAddress;


class ProfileController extends Controller
{
    public function profile(Request $request){
    	if(isset($request->user_id)){
			$a = new Apiquery;
            $basedata = $a->basedata($request->user_id);
            $user_detail = UserDetail::where('user_id',$request->user_id)->first();

            
            return response()->json([
                'status' => 'ok',
                'basedata' => $basedata,
                'user_detail' => $user_detail
            ]);
            
    	} else {
    		return response()->json(['error' => '2001']);
    	}
    }

    public function profile_edit(Request $request){
    	if(isset($request->user_id)){
			$a = new Apiquery;
            $basedata = $a->basedata($request->user_id);
            $lang = $basedata['user']->language;
            $user_detail = UserDetail::where('user_id',$request->user_id)->first();
            $professions_array = UserProfession::all();
            $g = new General;
			$professions = $g->getLangFromObjArray($professions_array,$lang);
			$languages = array("en","it","es","ja");
			$address = UserAddress::where('user_id',$request->user_id)->first();
            
            
            
            return response()->json([
                'status' => 'ok',
                'basedata' => $basedata,
                'user_detail' => $user_detail,
                'professions' => $professions,
                'languages' => $languages,
                'address' => $address
            ]);
            
    	} else {
    		return response()->json(['error' => '2001']);
    	}
    }

    public function profile_editimage(Request $request){
        if(isset($request->user_id)){
            $a = new Apiquery;
            $basedata = $a->basedata($request->user_id);
            $lang = $basedata['user']->language;
            $user_detail = UserDetail::where('user_id',$request->user_id)->first();
            $professions_array = UserProfession::all();
            $g = new General;
            $professions = $g->getLangFromObjArray($professions_array,$lang);
            $languages = array("en","it","es","ja");
            $address = UserAddress::where('user_id',$request->user_id)->first();

            //Begin images shit
            print_r($request->img_name);
            print_r($request->img_tmp_name);
            die();
            
            
            return response()->json([
                'status' => 'ok',
                'basedata' => $basedata,
                'user_detail' => $user_detail,
                'professions' => $professions,
                'languages' => $languages,
                'address' => $address
            ]);
            
        } else {
            return response()->json(['error' => '2001']);
        }
    }
}
