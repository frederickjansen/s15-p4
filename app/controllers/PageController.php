<?php

use Illuminate\Support\Facades\View;

class PageController extends BaseController
{
    public function __construct()
    {
        // Make sure users are authenticated
        //$this->beforeFilter('auth', array('except' => 'getLogin'));
        // Protect against CSRF
        $this->beforeFilter('csrf', array('on' => 'post'));
    }

    /**
     * Show index page
     *
     * @return mixed
     */
    public function index()
    {
        /** @var Doctrine\ORM\EntityManagerInterface $em */
        $em = App::make('Doctrine\ORM\EntityManagerInterface');
        $articles = $em->getRepository('Article')->getLatestArticles();
        // Get the latest comments to be shown in the sidebar
        $comments = $this->getLatestComments();

        return View::make('page.index', array(
            'articles'  =>  $articles,
            'latestComments' => $comments
        ));
    }

    /**
     * Get a number of comments, sorted DESC on created_at
     *
     * @param int $amount Amount of comments to show
     * @return mixed
     */
    private function getLatestComments($amount = 3)
    {
        $em = App::make('Doctrine\ORM\EntityManagerInterface');
        $articles = $em->getRepository('Comment')->getLatestComments($amount);

        return $articles;
    }
}