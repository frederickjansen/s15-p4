<?php

class PageController extends \BaseController
{
    public function __construct()
    {
        // Make sure users are authenticated
        $this->beforeFilter('auth', array('except' => 'getLogin'));
        // Protect against CSRF
        $this->beforeFilter('csrf', array('on' => 'post'));
    }
}