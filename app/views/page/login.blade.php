@extends('base')

<div class="login">
	<div class="login-screen">
		<div class="login-icon">
			<img src="/img/illustrations/colors.png" alt="Welcome to Ellipsis" />
			<h4>Welcome to <small>Ellipsis</small></h4>
		</div>

		<form class="login-form" action="/login" method="post">
            {{ $csrf_token }}
			<div class="control-group">
				<input type="text" class="login-field" value="{{ $_username or '' }}" autofocus placeholder="Enter your user name" name="_username" id="username" />
				<label class="login-field-icon fui-man-16" for="username"></label>
			</div>

			<div class="control-group">
				<input type="password" class="login-field" value="" placeholder="Password" name="_password" id="password" />
				<label class="login-field-icon fui-lock-16" for="password"></label>
			</div>

			<label class="checkbox checked" for="remember_me">
				<span class="icons">
					<span class="first-icon fui-checkbox-unchecked"></span>
					<span class="second-icon fui-checkbox-checked"></span></span>
				<input type="checkbox" value="" id="remember_me" name="_remember_me" data-toggle="checkbox" checked="checked">
                Remember me
			</label>

			<input class="btn btn-primary btn-large btn-block" type="submit" id="_submit" name="_submit" value="Login" />
		</form>
	</div>
</div>