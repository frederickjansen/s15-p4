<?php

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;

class LoginController extends \BaseController
{
    public function __construct()
    {
        // Protect against CSRF
        $this->beforeFilter('csrf', array('on' => 'post'));
    }

    /**
     * Show the login page
     *
     * @return mixed
     */
    public function getLogin()
    {
        // Only login for guests
        if (Auth::guest())
        {
            // No form builder, so we generate the CSRF token manually
            $csrf_token = Form::token();

            return View::make('page.login', array(
                'csrf_token' => $csrf_token,
                'email' => Input::old('email')
            ));
        }
        else
        {
            return Redirect::route('home');
        }
    }

    /**
     * Login the user
     *
     * @return mixed
     */
    public function postLogin()
    {
        $data = Input::all();
        // Validation rules
        $rules = array(
            'email' => 'required|email',
            'password' => 'required'
        );

        $validator = Validator::make($data, $rules);

        if ($validator->passes())
        {
            // Data to pass to Auth for login attempt
            $user = array(
                'email' => Input::get('email'),
                'password' => Input::get('password')
            );

            // Attempt to login user
            if (Auth::attempt($user))
            {
                return Redirect::route('home');
            }
            else
            {
                // Login details were incorrect
                return Redirect::route('login')
                    ->withErrors('Your username/password is incorrect.')
                    ->withInput();
            }
        }

        // Validation failed
        return Redirect::route('login')
            ->withErrors($validator)
            ->withInput();
    }

    /**
     * Logout user
     *
     * @return mixed
     */
    public function logout()
    {
        Auth::logout();
        return Redirect::route('home');
    }
}