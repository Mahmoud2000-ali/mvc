<?php

namespace mvc\controllers;

use mvc\core\Controller;

class WelcomeController extends Controller
{

    public function index()
    {
       
        $this->view("home.index");
    } //-- end of function index

}//-- end of class HomeController