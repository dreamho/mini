@extends('main')

@section('content')
    <hr>
    @if(!empty($errors))
        <ul>
        @foreach($errors as $error)
            @foreach($error as $value)
                <li>{{$value}}</li>
            @endforeach
        @endforeach
        </ul>
    @endif
    <form method="POST" action="{{URL}}register">
        <label>Name:</label><br>
        <input autofocus type="text" name="name" /><br><br>
        <label>Email</label><br>
        <input type="text" name="email" /><br><br>
        <label>Password</label><br>
        <input type="password" name="password" /><br><br>
        <label>Repeat Password</label><br>
        <input type="password" name="re_password" /><br><br>
        <input type="submit" name="submit_save_user" value="Save" />
    </form>
@stop