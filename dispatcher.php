<?php

namespace AHT;

use AHT\Router;
use AHT\Request;

class Dispatcher
{

    private $request;

    public function dispatch()
    {
        //echo 'dispatch';die();
        $this->request = new Request();
        
        Router::parse($this->request->url, $this->request);
        
        $controller = $this->loadController();
        // var_dump($this->request->action);die();
        call_user_func_array([$controller, $this->request->action], $this->request->params);
        // die('a');
    }

    public function loadController()
    {
        // đang dùng psr-4 nên phải có namespace, use không hoạt động khi khia báo qua biến
        $name = str_replace('Controller', '', $this->request->controller);
        $nameController = "AHT\\Controllers\\" . ucfirst($name) . "Controller";       
        $controller = new $nameController();    
        return $controller;
    }
}