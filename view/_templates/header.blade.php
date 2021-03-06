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
    <a href="{{ URL }}home/exampleone">subpage</a>
    <a href="{{ URL }}home/exampletwo">subpage 2</a>
    <a href="{{ URL }}songs">songs</a>
    <div class="auth">
        <?php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        ?>
        @if(isset($_SESSION['name']))
            <span>Hello {{$_SESSION['name']}}</span>
            <a href='{{URL}}logout'>logout</a>
        @else
            <a href='{{URL}}register'>register</a>
            <a href='{{URL}}login'>login</a>
        @endif
    </div>
</div>