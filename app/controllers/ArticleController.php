<?php

class ArticleController extends BaseController
{
    public function __construct()
    {
        // Make sure users are authenticated
        $this->beforeFilter('auth');
        // Protect against CSRF
        $this->beforeFilter('csrf', array('on' => 'post'));
    }
}