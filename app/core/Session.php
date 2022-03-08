<?php

namespace mvc\core;

class Session
{

    // start session
    static public function start()
    {
        @session_start();
    } //-- end of static public function start

    // set value to session
    static public function set($name, $value)
    {
        $_SESSION[$name] = $value;
    } //-- end of static public function set

    // get value from session
    static public function get($name)
    {

        return $_SESSION[$name];
    } //-- end of static public function get

    // remove session
    static public function remove($name = null)
    {
        if ($name)
            return $_SESSION[$name] = null;

        session_unset();
        session_destroy();
    } //-- end of static remove  public function

    //flash session
    static public function flash($value)
    {
        $_SESSION['flash'] = $value;
    } //-- end of flash public function flash

    // check session
    static public function check($name)
    {

        if (isset($_SESSION[$name]) && !empty($_SESSION[$name]))
            return 1;

        return 0;
    } //-- end of static check public function
}//-- end class session