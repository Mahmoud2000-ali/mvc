<?php


namespace mvc\core;

use Rakit\Validation\ErrorBag;

class Helper
{

    // redirect function
    static function redirect($path)
    {

        header('location: http://mvc.me' . $path);
    } //-- end redirect function

    // display is-invalid class
    static public function is_invalid($input)
    {

        return isset(ErrorBag::firstOfAll()[$input]) && !empty(ErrorBag::firstOfAll()[$input]) ? 'is-invalid' : '';
    } //-- end display is_invalid


    // display error
    static public function error($input)
    {

        return isset(ErrorBag::firstOfAll()[$input]) && !empty(ErrorBag::firstOfAll()[$input]) ? ErrorBag::firstOfAll()[$input] : '';
    } //-- end display is_invalid


    // display old input
    static public function old($input)
    {

        return isset($_POST[$input]) && !empty($_POST[$input]) ? $_POST[$input] : '';
    } //-- end display old input


    // display flash
    static public function flash()
    {
?>
        <p class="alert alert-success mt-4"><?= Session::get('flash') ?></p>
<?php
        Session::remove('flash');
    } //-- end display flash

    // dd
    static public function dd($value){
        echo "<pre>";
        print_r($value);
        die();
    }
}//-- end Helper Class
