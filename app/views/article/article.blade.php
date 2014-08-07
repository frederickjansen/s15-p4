@extends('layout')

@section('title')
    {{ $article->getTitle() }}
@stop

@section('body')

    <div class="row">
        <form action="{{ route('article_show', $article->getId()) }}" method="post">
            {{ $csrf_token }}
            <div class="span9">
                @if ($article->getAuthor()->getEmail() == Auth::user()->getEmail())
                    <h2 class="mbl">Article</h2>
                    <article class="article">
                        <div>
                            <div class="control-group">
                                <input type="text" class="title-field" value="{{ $article->getTitle() }}" placeholder="Enter the title" name="title" id="title" required/>
                                <label class="title-field-icon fui-menu-16" for="title"></label>
                            </div>
                            <div class="control-group">
                                <textarea placeholder="Enter the article" name="article" id="article" required>{{ $article->getArticle() }}</textarea>
                            </div>
                        </div>

                        <input type="submit" value="Save" class="btn btn-primary btn-block btn-large" />
                    </article>
                @else
                    <h2 class="mbl">Article</h2>
                    <article class="article">
                        <div>
                            <div class="control-group">
                                <input type="text" class="title-field" value="{{ $article->getTitle() }}" placeholder="Enter the title" name="title" id="title" required disabled/>
                                <label class="title-field-icon fui-menu-16" for="title"></label>
                            </div>
                            <div class="control-group">
                                <textarea placeholder="Enter the article" name="article" id="article" required disabled>{{ $article->getArticle() }}</textarea>
                            </div>
                        </div>

                        <input type="submit" value="Save" disabled="disabled" class="btn btn-primary btn-block btn-large" />
                    </article>
                @endif
            </div>
            @if ($article->getAuthor()->getEmail() == Auth::user()->getEmail())
                <div class="span3">
                    <h3 class="mbm mtl">Tags</h3>
                    <input name="tagsinput" id="tagsinput" class="tagsinput" value="{{ $article->getTags() }}"/>
                </div>
            @else
                <div class="span3">
                    <h3 class="mbm mtl">Tags</h3>
                    <input name="tagsinput" id="tagsinput" class="tagsinput" value="{{ $article->getTags() }}" disabled/>
                </div>
            @endif
        </form>
        <!-- <div class="span3">
            <h3 class="mtl mbl">Add Comment</h3>
            <section class="future-comments">
                {% render controller('ImdEllipsisBundle:Comment:showForm', { 'articleId': article.id }) %}
            </section>
        </div> -->
    </div>

    <!-- <div class="row">
        <div class="span9">
            <section class="comments" id="comments">
                <h3 class="mtl mbl">Comments</h3>
                <section class="previous-comments">
                    {% include 'ImdEllipsisBundle:Comment:comment.html.twig' with { 'comments': comments } %}
                </section>
            </section>
        </div>
    </div> -->

@stop