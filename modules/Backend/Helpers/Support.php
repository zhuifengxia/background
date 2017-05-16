<?php


if( !function_exists('backendView') ) {
    function backendView( $name )
    {
        return call_user_func_array('view',  ['backend::' . $name ] + func_get_args() );
    }

}

if (! function_exists('backendUrl')) {
    /**
     * Generate a url for the application.
     *
     * @param  string  $path
     * @param  mixed   $parameters
     * @param  bool    $secure
     * @return Illuminate\Contracts\Routing\UrlGenerator|string
     */
    function backendUrl($path = null, $parameters = [], $secure = null)
    {
        if (is_null($path)) {
            return app(UrlGenerator::class);
        }

        $path = urlFormatParameters($path, $parameters);
        return url('/backend' . ($path[0] == '/' ? '' : '/') . $path, $parameters, $secure);
    }
}

if( !function_exists('urlFormatParameters') ) {
    /**
     * @param $path
     * @param array &$parameters
     * @return mixed
     */
    function urlFormatParameters( $path, &$parameters = [] ) {
        foreach( $parameters as $key => $value ) {
            $path = str_replace(':' . $key, $value, $path);
            unset($parameters[$key]);
        }

        return $path;
    }
}

if( !function_exists('isPost') ) {
    /**
     * check Request is Get Or Post
     * @return bool
     */
    function isPost() {
        return array_get($_SERVER, 'REQUEST_METHOD') === 'POST';
    }
}
//if( !function_exists('backendNavigation') ) {
//    function backendNavigation() {
//        $item = app(\Modules\Backend\Classes\NavigationManager::class);
//        var_dump( $item );exit;
//    }
//}


if( !function_exists('form') ) {
    function form() {

    }
}
