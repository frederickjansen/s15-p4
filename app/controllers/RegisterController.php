<?php

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;

class RegisterController extends BaseController
{
    public function __construct()
    {
        // Protect against CSRF
        $this->beforeFilter('csrf', array('on' => 'post'));
    }

    public function getRegister()
    {
        if (Auth::guest())
        {
            $csrf_token = Form::token();
            $data['email'] = Input::old('email');
            $data['csrf_token'] = $csrf_token;

            return View::make('page.register', $data);
        }
        else
        {
            return Redirect::route('home');
        }
    }

    public function postRegister()
    {
        $data = Input::all();
        $rules = array(
            'email' => 'required|email',
            'password' => 'required'
        );

        $validator = Validator::make($data, $rules);

        if ($validator->passes())
        {
            /** @var Doctrine\ORM\EntityManagerInterface $em */
            $em = App::make('Doctrine\ORM\EntityManagerInterface');

            $user = new User();
            $user->setEmail(Input::get('email'));
            $user->setPassword(Hash::make(Input::get('password')));

            $em->persist($user);
            $em->flush();

            if (Auth::attempt($user))
            {
                return Redirect::route('home');
            }
            else
            {
                return Redirect::route('register')
                    ->withErrors('Email already taken.')
                    ->withInput();
            }
        }

        return Redirect::route('register')
            ->withErrors($validator)
            ->withInput();
    }
}