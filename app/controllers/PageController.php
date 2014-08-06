<?php

class PageController extends \BaseController
{
    public function __construct()
    {
        $this->beforeFilter('auth', array('except' => 'getLogin'));

        $this->beforeFilter('csrf', array('on' => 'post'));

        $this->afterFilter('log', array('only' =>
        array('fooAction', 'barAction')));
    }
}