<?php

namespace mvc\models;

use mvc\core\Model;

class User extends Model
{
    /**
     * THE DEFAULT TABLE OF THIS MODEL IS users
     * TO CHANGE THIS DEFAULT
     * $table = customs
     * **/

   // create check method by take email and password
   static public function checkUser($email, $password){
        return Model::db()->row("SELECT * FROM users WHERE email = ? AND password = ?", [$email, $password]);
   }
}//--end class User
