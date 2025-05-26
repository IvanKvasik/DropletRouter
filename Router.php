<?php
namespace Router;
class Router{
	public static function all(string $URI, $callback){
		$currentURI = $_SERVER['REQUEST_URI'];
		$expectedParts = explode('/', $URI);
		$currentParts = explode('/', $currentURI);
		$args = array();
		$satisfies = true;
		$last_index = 0;
		foreach ($expectedParts as $index => $value) {
			if(!array_key_exists($index, $currentParts)){
				if($value != '')$satisfies = false;
				break;
			}
			if(substr($value, 0, 1) == '{' && substr($value, -1) == '}'){
				$args[substr($value, 1, -1)] = $currentParts[$index];
			}else if($value != $currentParts[$index]){
				$satisfies = false;
				break;
			}
			$last_index = $index;
		}
		if(array_key_exists($last_index + 1, $currentParts) && $currentParts[$last_index+1] != '') $satisfies = false;
		if($satisfies) $callback(...$args);
	}
	public static function request(string $URI, $callback, string $method){
		if($_SERVER['REQUEST_METHOD'] === $method){
			self::all($URI, $callback);
		}
	}
}