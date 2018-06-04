<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>MINI</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- JS -->
    <!-- please note: The JavaScript files are loaded in the footer to speed up page construction -->
    <!-- See more here: http://stackoverflow.com/q/2105327/1114320 -->

    <!-- CSS -->
    <link href="<?php echo URL; ?>css/style.css" rel="stylesheet">
</head>
<body>
<!-- logo -->
<div class="logo">
    MINI
</div>

<!-- navigation -->
<div class="navigation">
    <a href="/">home</a>
    <a href="home/exampleone">subpage</a>
    <a href="home/exampletwo">subpage 2</a>
    <a href="songs">songs</a>
    <div class="auth">
        <?php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        ?>
        @if(isset($_SESSION['name']))
            <span>Hello {{$_SESSION['name']}}</span>
            <a href='{{URL}}auth/logout'>logout</a>
        @else
            <a href='{{URL}}auth/registerform'>register</a>
            <a href='{{URL}}auth/loginform'>login</a>
        @endif
    </div>
</div>