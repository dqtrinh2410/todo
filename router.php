<?php

namespace AHT;

class Router
{
    static public function parse($url, $request)
    {
        $url = trim($url);
        // var_dump($url);die();

        if ($url == "/mvc/")
        {
            $request->controller = "tasks";
            $request->action = "index";
            $request->params = [];
            
        }
        else
        {
            $explode_url = explode('/', $url);
            // echo '1st url';
            // var_dump( $explode_url ) ;echo 'br>';
            $explode_url = array_slice($explode_url, 2);
            // echo '2st url';
            // var_dump( $explode_url );
            $request->controller = $explode_url[0];
            $request->action = $explode_url[1];
            $request->params = array_slice($explode_url, 2);
            //echo 'param';
            //var_dump( $request->controller, $request->action );die();
        }
    }
}