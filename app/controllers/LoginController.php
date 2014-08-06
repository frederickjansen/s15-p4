<?php

use Illuminate\Support\Facades\View;

class LoginController extends \BaseController
{
    public function getLogin()
    {
        $csrf_token = Form::token();
        return View::make('page.login', array('csrf_token' => $csrf_token));
    }

    public function postLogin()
    {

    }

}