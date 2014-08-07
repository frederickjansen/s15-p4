<?php

use Illuminate\Support\Facades\View;

class ArticleController extends \BaseController
{
    public function __construct()
    {
        // Make sure users are authenticated
        $this->beforeFilter('auth', array('except' => 'show'));
        // Protect against CSRF
        $this->beforeFilter('csrf', array('on' => 'post'));
    }

    public function store()
    {
        $data = Input::all();
        $rules = array(
            'title' => 'required',
            'article' => 'required'
        );

        $validator = Validator::make($data, $rules);

        if ($validator->passes())
        {
            /** @var Doctrine\ORM\EntityManagerInterface $em */
            $em = App::make('Doctrine\ORM\EntityManagerInterface');

            $article = new Article();
            $article->setTitle(Input::get('title'));
            $article->setArticle(Input::get('article'));
            $article->setAuthor($em->getRepository('User')->find(Auth::user()));

            $em->persist($article);
            $em->flush();

            return Redirect::route('home');
        }

        return Redirect::route('article_create')
            ->withErrors($validator)
            ->withInput();
    }

    public function create()
    {
        $data['csrf_token'] = Form::token();
        $data['title'] = Input::old('title');
        $data['article'] = Input::old('article');
        return View::make('article.create', $data);
    }

    public function show()
    {

    }
}