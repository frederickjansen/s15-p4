<?php

use Illuminate\Support\Facades\View;

class PageController extends BaseController
{
    public function __construct()
    {
        // Make sure users are authenticated
        $this->beforeFilter('auth', array('except' => 'getLogin'));
        // Protect against CSRF
        $this->beforeFilter('csrf', array('on' => 'post'));
    }

    public function index()
    {
        /** @var Doctrine\ORM\EntityManagerInterface $em */
        $em = App::make('Doctrine\ORM\EntityManagerInterface');
        $articles = $em->getRepository('Article')->getLatestArticles();

        return View::make('page.index', array(
            'articles'  =>  $articles
        ));
    }
}