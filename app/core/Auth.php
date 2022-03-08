<?php

namespace mvc\core;

class Auth
{

    // return the user how login in the website
    static public function check()
    {
        return Session::check('user');
    } //-- end check


    // return the user who make login
    static public function user()
    {
        return Session::get('user');
    }
}//-- end of class Auth