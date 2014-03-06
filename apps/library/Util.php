<?php
/**
 * Utils Class
 * A Class for Util functions.
 * 
 * 
 * @author Renan Correa Pinto - github.com/nancorrea
 * */
class Util extends \Phalcon\Mvc\User\Component
{
	/**
	 * Transforms a string "lorem_ipsum" to "LoremIpsum"
	 * */
	static function camelize($str) 
	{
    	$str[0] = strtoupper($str[0]);
		$func = create_function('$c', 'return strtoupper($c[1]);');
		return preg_replace_callback('/_([a-z])/', $func, $str);
	}

	/**
	 * Prepare an array with special characters to be sent as JSON.
	 * Gets a UTF-8 string and converts it to UnicodeCodePoints.
	 * */
	static function prepareJson($arr) 
	{
		array_walk_recursive($arr, function ($item, $key) {
			
			if (!mb_check_encoding($item, 'UTF-8')) {
		        trigger_error('are you sure this string is UTF-8 encoded?');
		        return false;
		    }
					
		    return preg_replace_callback('/./u', function ($m) {
		        $ord = ord($m[0]);
		        if ($ord <= 127) {
		            return sprintf('\u%04x', $ord);
		        } else {
		            return trim(json_encode($m[0]), '"');
		        }
		    }, $item);
		});
		return $arr;
	}
}
