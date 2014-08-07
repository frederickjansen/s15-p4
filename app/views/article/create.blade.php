@extends('layout')

@section('title')
    New - Ellipsis
@stop

@section('body')
<div class="row">
    <div class="span9">
        <form action="{{ route('articles') }}" method="post">
            <ul class="errors">
                @foreach($errors->all() as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            {{ $csrf_token }}
            <h2 class="mbl">New article</h2>
            <section class="article">
                <div>
                    <div class="control-group">
                        <input type="text" class="title-field" value="{{ $title or '' }}" placeholder="Enter the title" name="title" id="title" required />
                        <label class="title-field-icon fui-menu-16" for="title"></label>
                    </div>
                    <div class="control-group">
                        <textarea placeholder="Enter the article" name="article" id="article" required>{{ $article or '' }}</textarea>
                    </div>
                </div>
                <input type="submit" value="Save" class="btn btn-primary btn-block btn-large" />
            </section>
        </form>
    </div>
</div>
@stop