@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12 col-sm-6 offset-sm-3 col-md-4 offset-md-4">
            <h1>Login</h1>
            <form action="{{route('login')}}" method="POST">
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group">
                    <label for="">&nbsp;</label>
                    <input type="submit" class="btn btn-primary" value="Login">
                    {{csrf_field()}}
                </div>
            </form>
        </div>
    </div>
    @endsection
