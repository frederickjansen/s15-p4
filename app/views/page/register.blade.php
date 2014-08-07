@extends('base')

@section('title')
    Register a new account - Ellipsis
@stop

<div class="login">
    <div class="login-screen">
        <div class="login-icon">
            <img src="/img/illustrations/colors.png" alt="Welcome to Ellipsis" />
            <h4>Register an account</h4>
        </div>

        <form class="login-form" action="/register" method="post">
            <ul class="errors">
                @foreach($errors->all() as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            {{ $csrf_token }}
            <div class="control-group">
                <input type="email" class="login-field" value="{{ $email }}" autofocus placeholder="Enter your email" name="email" id="email" required />
                <label class="login-field-icon fui-man-16" for="email"></label>
            </div>

            <div class="control-group">
                <input type="password" class="login-field" value="" placeholder="Password" name="password" id="password" required />
                <label class="login-field-icon fui-lock-16" for="password"></label>
            </div>

            <input class="btn btn-primary btn-large btn-block" type="submit" id="submit" name="submit" value="Register" />
        </form>
    </div>
</div>