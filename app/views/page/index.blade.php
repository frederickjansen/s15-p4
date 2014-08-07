@extends('layout')

@section('title')
    Articles - Ellipsis
@stop

@section('body')
        <div class="row">
            <div class="span8">
                <h1>Articles</h1>
                <div class="articles">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="pll">Article</th>
                            <th>Author</th>
                            <th>Comments</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($articles as $article)
                            <tr class="success">
                                <td class="pll"><a href="{{ route('article_show', $article->getId()) }}">{{{ $article->getTitle() }}}</a></td>
                                <td>{{{ $article->getAuthor()->getEmail() }}}</td>
                                <td><a href="{{ route('article_show', $article->getId()) }}">{{{ count($article->getComments()) }}}</a></td>
                            </tr>
                        @empty
                        <tr class="info">
                            <td>There are no articles</td>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>
                    @if (Auth::check())
                    <a href="{{ route('article_create') }}" class="btn btn-primary btn-block btn-large">New</a>
                    @endif
                </div>

            </div><!-- /span8 articles -->
            @include('page.sidebar');
        </div><!-- /row -->
@stop