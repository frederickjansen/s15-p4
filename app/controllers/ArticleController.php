<?php

use Illuminate\Support\Facades\View;

class ArticleController extends \BaseController
{
    public function __construct()
    {
        // Make sure users are authenticated
        $this->beforeFilter('auth');
        // Protect against CSRF
        $this->beforeFilter('csrf', array('on' => 'post'));
    }

    public function create()
    {
        $data['csrf_token'] = Form::token();
        return View::make('article.create', $data);
    }
}