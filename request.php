<?php

namespace AHT;

    class Request
    {
        public $url;

        public function __construct()
        {
            //echo 'req';die();
            $this->url = $_SERVER["REQUEST_URI"];
            // var_dump($_SERVER["REQUEST_URI"]);die();
        }
    }

?>