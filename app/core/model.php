<?php

namespace mvc\core;

use Dcblogdev\PdoWrapper\Database;
use mvc\core\TraitModel;


class Model extends Database
{

    use TraitModel;


    public function __construct()
    {
        Self::render();
    }

    static public function db()
    {
        $options = [
            //required
            'username' => 'root',
            'database' => 'mvc',
            //optional
            'password' => '',
            'type' => 'mysql',
            'charset' => 'utf8',
            'host' => 'localhost',
            'port' => '3306'
        ];

        return new Database($options);
    }

    // function to get the name of the model
    static public function render()
    {
        // get_called_class() ==> mvc\models\User
        $arr = explode('\\', get_called_class());

        if (isset(get_called_class()::$table))
            return get_called_class()::$table;

        return strtolower($arr[2]) . 's';
    } //-- end function render()
}//-- end class model