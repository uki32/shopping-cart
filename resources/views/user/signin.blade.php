@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1>Sign In</h1>
            @if(count($errors) > 0)
                <div class="alert danger">
                    @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <form action="/signin" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="text" id="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Sign In</button>
            </form>
            <p>Don't have an account? <a href="{{ route('signup.view') }}">Sign up instead!</a></p>
        </div>
    </div>
@endsection
