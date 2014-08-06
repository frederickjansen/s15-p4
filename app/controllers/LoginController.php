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

    public function getLogin()
    {
        if (Auth::guest())
        {
            $csrf_token = Form::token();
            return View::make('page.login', array(
                'csrf_token' => $csrf_token,
                'email' => Input::old('email')
            ));
        }
        else
        {
            return Redirect::to('/');
        }


    }

    public function postLogin()
    {
        $data = Input::all();
        $rules = array(
            'email' => 'required|email',
            'password' => 'required'
        );

        $validator = Validator::make($data, $rules);

        if ($validator->passes())
        {
            $user = array(
                'email' => Input::get('email'),
                'password' => Input::get('password')
            );

            if (Auth::attempt($user))
            {
                return Redirect::to('/');
            }
            else
            {
                return Redirect::route('login')
                    ->withErrors('Your username/password is incorrect.')
                    ->withInput();
            }
        }

        return Redirect::route('login')
            ->withErrors($validator)
            ->withInput();
    }

}