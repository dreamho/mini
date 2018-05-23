@extends('main')

@section('content')
    <hr>
    <h3>{{$message ? $message : ""}}</h3>

    @if(!empty($errors))
        <ul>
        @foreach($errors as $error)
            @foreach($error as $value)
                    <li>{{$value}}</li>
            @endforeach
        @endforeach
        </ul>
    @endif
    <form method="POST" action="{{URL}}auth/login">

        <label>Email</label><br>
        <input type="text" name="email" /><br><br>
        <label>Password</label><br>
        <input type="input" name="password" /><br><br>
        <input type="submit" name="submit_login_user" value="Login" />

    </form>
@stop