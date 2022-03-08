<?php

namespace mvc\core;

class Request{

    static public $request;

    public function __construct($method){
        Self::$request = $method;
    }
}//-- end class request

$_SERVER['REQUEST_METHOD'] == 'GET' ? new Request($_GET) : new Request($_POST);