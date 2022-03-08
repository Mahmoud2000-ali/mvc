<?php

namespace mvc\controllers;

use mvc\core\controller;
use mvc\models\User;

class UserController extends controller
{

    public function index()
    {   
        $users = User::all();

        return $this->view('user.index', ['users' => $users]);
    } //-- end index
}//-- end of class UserController