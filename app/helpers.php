<?php

/*
 * Global Helpers file with misc function
 */

if (!function_exists('app_name')) {

	/*
	 * Helpers to grab Application name 
	 */
	function app_name(){
		return config('app.name');
	}

}

