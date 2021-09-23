<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\General;
use App\Models\User;
use App\Models\UserProfession;
use App\Models\UserAddress;
use App\Models\UserDetail;


class UserController extends Controller
{
    public function register_complete(Request $request)
    {
        //print_r($request->data);
        if(isset($request->data)){
        	$d = $request->data;
        	$user_id= $d['user_id'];
		    $first_name= $d['first-name'];
		    $last_name= $d['last-name'];
		    $siterole= $d['siterole'];
		    $locality= $d['locality'];
		    $province= $d['province'];
		    $state= $d['state'];
		    $country= $d['country'];
		    $latitude= $d['latitude'];
		    $longitude= $d['longitude'];
		    $datebirth= $d['datebirth'];
		    $aboutyou= $d['aboutyou'];
		    $site= $d['site']; 
		    $facebook= $d['facebook']; 
		    $instagram= $d['instagram']; 
		    $twitter= $d['twitter']; 
		    $youtube= $d['youtube']; 
		    $tiktok= $d['tiktok']; 
		    $soundcloud= $d['soundcloud']; 
		    $drooble= $d['drooble']; 
		    $linkedin= $d['linkedin']; 

		    //FILL USER
		    $u = User::find($user_id);
		    $u->first_name = $first_name;
        	$u->last_name = $last_name;
        	$u->date_birth = $datebirth;
        	$u->user_profession_id = $siterole;
        	$u->save();

        	//FILL USERADDRESS
        	$uao = UserAddress::where('user_id',$user_id)->first();
        	if($uao){
        		// user address already filled
        		return response()->json(['error' => '1002']);
        	} else {
        		$ua = new UserAddress;
        		$ua->user_id = $user_id;
		        $ua->town = $locality;
		        $ua->province = $province;
		        $ua->state = $state;
		        $ua->country = $country;
		        $ua->zip = "";
		        $ua->latitude = $latitude;
		        $ua->longitude = $longitude;
		        $ua->save();
        	}

        	//FILL USERDETAILS
        	$udo = UserDetail::where('user_id',$user_id)->first();
        	if($udo){
        		// user details already filled
        		return response()->json(['error' => '1003']);
        	} else {
        		$ud = new UserDetail;
        		$ud->user_id = $user_id;
        		$ud->text = $aboutyou;
		        $ud->www = $site;
		        $ud->facebook = $facebook;
		        $ud->instagram = $instagram;
		        $ud->twitter = $twitter;
		        $ud->youtube = $youtube;
		        $ud->tiktok = $tiktok;
		        $ud->soundcloud = $soundcloud;
		        $ud->drooble = $drooble;
		        $ud->linkedin = $linkedin;
		        $ud->save();
        	}
        	
        } else {
        	// no $data array in request
        	return response()->json(['error' => '1001']);
        }

       	return response()->json([
	        'status' => 'ok'
	    ]);
    	
    }
}
