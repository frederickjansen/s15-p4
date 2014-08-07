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

    /**
     * Show the registration screen
     *
     * @return mixed
     */
    public function getRegister()
    {
        // Only allow registration when not logged in
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

    /**
     * Register new user
     *
     * @return mixed
     */
    public function postRegister()
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
            /** @var Doctrine\ORM\EntityManagerInterface $em */
            $em = App::make('Doctrine\ORM\EntityManagerInterface');
            // Check if email address is already present in database
            $oldUser = $em->getRepository('User')->getUserByEmail(Input::get('email'));
            // Only proceed if email isn't present yet
            if (empty($oldUser))
            {
                // Create new user
                $user = new User();
                $user->setEmail(Input::get('email'));
                $user->setPassword(Hash::make(Input::get('password')));

                // Save to database
                $em->persist($user);
                $em->flush();

                // Login user
                Auth::login($user);

                // Send back home
                // TODO: Send where user was coming from instead
                return Redirect::route('home');
            }
            else
            {
                // Email already taken, show error
                return Redirect::route('register')
                    ->withErrors('Email already taken.')
                    ->withInput();
            }
        }

        // Validation problems, show error
        return Redirect::route('register')
            ->withErrors($validator)
            ->withInput();
    }
}