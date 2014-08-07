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

    /**
     * Store a new article
     *
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $data = Input::all();
        // Validation rules
        $rules = array(
            'title' => 'required',
            'article' => 'required'
        );

        // Run validation
        $validator = Validator::make($data, $rules);

        if ($validator->passes())
        {
            /** @var Doctrine\ORM\EntityManagerInterface $em */
            $em = App::make('Doctrine\ORM\EntityManagerInterface');

            // Create new article
            $article = new Article();
            $article->setTitle(Input::get('title'));
            $article->setArticle(Input::get('article'));
            $article->setAuthor($em->getRepository('User')->find(Auth::user()));

            // Store it in the database
            $em->persist($article);
            $em->flush();

            return Redirect::route('home');
        }

        // Something went wrong during validation, go back and show errors
        return Redirect::route('article_create')
            ->withErrors($validator)
            ->withInput();
    }

    public function create()
    {
        // Prefill form with data
        $data['csrf_token'] = Form::token();
        $data['title'] = Input::old('title');
        $data['article'] = Input::old('article');

        return View::make('article.create', $data);
    }

    public function show($id)
    {
        /** @var Doctrine\ORM\EntityManagerInterface $em */
        $em = App::make('Doctrine\ORM\EntityManagerInterface');
        $article = $em->getRepository('Article')->find($id);

        if (!$article)
        {
            return Redirect::route('home');
        }

        $data['csrf_token'] = Form::token();
        $data['article'] = $article;

        return View::make('article.article', $data);
    }
}