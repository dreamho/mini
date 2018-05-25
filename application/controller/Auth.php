<?php

namespace App\controller;

use App\core\Controller;
use App\core\Session;
use App\model\Database;
use App\model\User;
use Illuminate\Support\Facades\App;

/**
 * Class Auth
 * @package App\controller
 */
class Auth extends Controller
{
    /**
     * Displaying register form
     */
    public function registerForm()
    {
        $errors = Session::get('errors');
        if ($errors != null) {
            Session::destroy('errors');
        }

        $this->view('auth/register', ['errors' => $errors]);
    }

    /**
     * Submitting register form and saving a new user
     */
    public function register()
    {
        if (isset($_POST['submit_save_user'])) {
            $rules = [
                'name' => 'required|max:60',
                'email' => 'required|email|max:60',
                'password' => 'required|min:6',
                're_password' => 'required|same:password'
            ];
            $validator = new Validator();
            $res = $validator->check($_POST, $rules);
            $errors = $res->errors()->toArray();
            if (count($errors) > 0) {

                Session::set('errors', $errors);
                redirect('auth/registerform');
            } else {
                //Database::getConnection();
                $user = new User;
                $user->name = $_POST['name'];
                $user->email = $_POST['email'];
                $user->password = md5($_POST['password']);
                $user->save();
                $status = User::find($user->id)->status;
                Session::set('name', $user->name);
                Session::set('status', $status);
                redirect('home');
            }
        }
    }

    /**
     * Displaying login form
     */
    public function loginForm()
    {
        $message = Session::get('message');
        $errors = Session::get('errors');
        if ($errors != null) {
            Session::destroy('errors');
        }
        if ($message != null) {
            Session::destroy('message');
        }
        $this->view('auth/login', ['errors' => $errors, 'message' => $message]);
    }

    /**
     * Login user
     */
    public function login()
    {
        if (isset($_POST['submit_login_user'])) {
            $rules = [
                'email' => 'required|email|max:60',
                'password' => 'required|min:6'
            ];
            $validator = new Validator();
            $res = $validator->check($_POST, $rules);
            $errors = $res->errors()->toArray();
            if (count($errors) > 0) {
                Session::set('errors', $errors);
                redirect('auth/loginform');
            } else {
                $user = User::where('email', $_POST['email'])->where('password', md5($_POST['password']))->first();
                if ($user) {
                    Session::set('name', $user->name);
                    Session::set('status', $user->status);
                    redirect('songs');
                } else {
                    Session::set('message', "Something goes wrong, try again!");
                    redirect('auth/loginform');
                }
            }
        }
    }

    /**
     * Logout user
     */
    public function logout()
    {
        $this->view('auth/logout');
    }
}
