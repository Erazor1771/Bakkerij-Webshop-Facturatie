<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,500,400italic,500italic,700,900,700italic,900italic&Open Sans&Oswald&Raleway' rel='stylesheet' type='text/css'>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentellela Alela! | </title>

    <!-- Bootstrap -->
    <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{url('css/custom.css')}}" rel="stylesheet">

</head>

<body class="nav-md">
<!--
    you can substitue the span of reauth email for a input with the email and
    include the remember me checkbox
    -->
<div class="container">
    <div class="card card-container">
        <h3>Admin Login</h3>
        <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
        <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
        <p id="profile-name" class="profile-name-card"></p>


        @if ($errors->has())
            <div class="error-box col-xs-12 alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
            <div class="clear"></div>
        @endif

        {{ Form::open(array('class' => 'form-signin', 'url' => 'admin/loginscreen/login')) }}
            <span id="reauth-email" class="reauth-email"></span>

            {{ Form::email('email', null, array('id' => 'inputEmail',
                                               'class' => 'form-control',
                                               'placeholder' => 'Email address',
                                               'required' => 'required',
                                               'autofocus' => 'autofocus'
            )) }}
            {{ Form::password('password', array('id' => 'inputPassword',
                                                'class' => 'form-control',
                                                'placeholder' => 'Password',
                                                'required' => 'required'
            )) }}

            <!-- <div id="remember" class="checkbox">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div> -->
            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
        {{ Form::close() }}

        <!-- <a href="#" class="forgot-password">
            Forgot the password?
        </a> -->

        </div><!-- /card-container -->
    </div><!-- /container -->
</body>
</html>
