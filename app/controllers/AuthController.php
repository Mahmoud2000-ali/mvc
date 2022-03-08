<?php


namespace mvc\controllers;

use mvc\core\Auth;
use mvc\core\Controller;
use mvc\core\Helper;
use mvc\core\Session;
use mvc\models\User;
use Rakit\Validation\ErrorBag;
use Rakit\Validation\Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        if (Auth::check())
            Helper::redirect("\blog");
    }

    public function login()
    {
        return $this->view('auth.login');
    } //-- end login

    // check email and password
    public function check_login()
    {
        $validator = new Validator;
        $validation = $validator->make($this->request(), [
            'email' => 'required|email',
            'password' => 'required|min:3',
        ]);

        /// validated it
        $validation->validate();

        // check error
        if (!$validation->fails()) {

            $user = User::checkUser($this->request('email'), $this->request('password'));

            if ($user) {
                Session::set('user', $user);
                return Helper::redirect('\home');
            }

            ErrorBag::add('email', '', 'the email or password incorrect');
        }
        return $this->view('auth.login', ['errors' => $validation->errors()->firstOfAll()]);
    } //-- end check_login

    // logout function
    public function logout()
    {
        Session::remove('user');
        Helper::redirect('\home');
    }
}//-- end of class AuthController