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

if (!function_exists('include_route_files')) {

	/*
	 * Helpers to for including routes 
	 */
	function include_route_files($folder){

		try {
            $rdi = new recursiveDirectoryIterator($folder);
            $it = new recursiveIteratorIterator($rdi);

            while ($it->valid()) {
                if (!$it->isDot() && $it->isFile() && $it->isReadable() && $it->current()->getExtension() === 'php') {
                    require $it->key();
                }

                $it->next();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
	}
}

if (!function_exists('home_route')) {

    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function home_route()
    {
        if (auth()->check()) {
            if (auth()->user()->can('view backend') && auth()->user()->isAdmin()) {
                return 'admin.dashboard';
            } else {
                return 'frontend.index';
            }
        }

        return 'frontend.index';
    }
}