<?php
namespace App;
use Illuminate\Http\Request;

class General {

	public function __construct()
	{

	}

	//return array

	public function getLangFromObjArray($obj,$lang) {
		$array = array();
	  	foreach($obj as $o){
	  		$field = "name_".$lang;
	  		$string = $o->{$field};
	  		if($string==
	  			"") $string = $o->name_en;
	  		$array[$o->id] = $string;
	  	}
	  return $array;
	}

	public function getLangFromObj($obj,$lang) {
		$field = "name_".$lang;
		$string = $obj->{$field};
		if($string == "")
			$string = $obj->name_en;
	  	return $string;
	}

	/**
	 * Get either a Gravatar URL or complete image tag for a specified email address.
	 *
	 * @param string $email The email address
	 * @param string $s Size in pixels, defaults to 80px [ 1 - 2048 ]
	 * @param string $d Default imageset to use [ 404 | mp | identicon | monsterid | wavatar ]
	 * @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
	 * @param boole $img True to return a complete IMG tag False for just the URL
	 * @param array $atts Optional, additional key/value attributes to include in the IMG tag
	 * @return String containing either just a URL or a complete image tag
	 * @source https://gravatar.com/site/implement/images/php/
	 */
	public function get_gravatar( $email, $s = 80, $d = 'monsterid', $r = 'g', $img = false, $atts = array() ) {
	    $url = 'https://www.gravatar.com/avatar/';
	    $url .= md5( strtolower( trim( $email ) ) );
	    $url .= "?s=$s&d=$d&r=$r";
	    if ( $img ) {
	        $url = '<img src="' . $url . '"';
	        foreach ( $atts as $key => $val )
	            $url .= ' ' . $key . '="' . $val . '"';
	        $url .= ' />';
	    }
	    return $url;
	}
}

?>
