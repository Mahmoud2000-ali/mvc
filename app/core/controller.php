<?php

namespace mvc\core;

use mvc\core\Request;
use mvc\core\Session;
use Dcblogdev\PdoWrapper\Database;

class controller
{

    public function __construct(){

        Session::start();
    }

    public function view($path, array $params = [])
    {
        extract($params);
        require_once(VIEWS . str_replace('.', DS, $path) . ".php");
    }

    public function request($param = null)
    {
        if ($param)
            return Request::$request[$param];
        return Request::$request;
    } //-- end request function

}//-- end of class controller