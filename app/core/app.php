<?php


namespace mvc\core;

use Exception;

class App
{
    private $controller = "HomeController";
    private $method = "index";
    private $params = [];

    public function __construct()
    {
        $this->url();
        $this->render();
    }

    /// get the query string ==> blog/create make array ([0] => blog, [1]=> create)
    private function url()
    {
        // check if the query isset or not
        if (isset($_SERVER['QUERY_STRING']) && !empty($_SERVER['QUERY_STRING'])) {

            $quey_string = $_SERVER['QUERY_STRING'];
            $urls =  explode('/', $quey_string);

            // formate controller
            $this->controller = !empty($urls[0]) ? ucfirst($urls[0]) . "Controller" : "HomeController";

            // formate method
            $this->method = empty($urls[1]) ? "index" : $urls[1];

            // formate params
            unset($urls[0], $urls[1]);
            $params = array_values($urls);
            $this->params = $params;
        }
    } //-- end of function urls

    // function check if the controller is exist or not
    private function render()
    {

        // check for controller and method
        $controller = "mvc\controllers\\" . $this->controller;

        if (class_exists($controller) && method_exists($controller, $this->method)) {
            
            // check for route name
            $posts = ['store', 'delete', 'update', 'check_login', 'logout'];
            if (in_array($this->method, $posts))
                if ($_SERVER['REQUEST_METHOD'] == 'GET')
                    throw new Exception("not found");

            call_user_func_array([new $controller, $this->method], $this->params);
        } else {
            throw new Exception("not found");
        }
    }
}//-- end of class App
