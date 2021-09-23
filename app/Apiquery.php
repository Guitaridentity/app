<?php
namespace App;
use Illuminate\Http\Request;
use App\General;
use App\Models\Role;
use App\Models\Plan;
use App\Models\User;
use App\Models\Guitar;
use App\Models\Guitarowner;
use App\Models\UserProfession;
use App\Models\UserDetail;

class Apiquery {

	public function __construct()
	{

	}

	public function basedata($user_id){
		// GET USER
    	$user = User::find($user_id);
    	$lang = $user->language;
    	$profession_id = $user->user_profession_id;
    	$user_roles = $user->roles()->get();
		$user_role = $user_roles[0]->id;
		$role = Role::find($user_role);
		$p = Plan::all();
		$plan = $p->load('roles');
		$user_professions = UserProfession::find($profession_id);
		$g = new General;
		$user_profession = $g->getLangFromObj($user_professions,$lang);
		$guitars_owned = Guitarowner::where('hix',0)->where('user_id',$user_id)->get();
		if(count($guitars_owned)==0){
			$user_guitars = 0;
		} else {
			$user_guitars = 1;
		}
		
    	return array(
    		'user' => $user,
    		'plan' => $plan[0],
    		'user_guitars_count' => $user_guitars,
    		'user_profession' => $user_profession,
    	);
	}

	
}

?>
