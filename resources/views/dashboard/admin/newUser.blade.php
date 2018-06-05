@extends('layouts.dashboard')
@section('content')
    <h1>New User</h1>
    <div class="col-12 col-sm-6 col-md-5">
        <form action="{{route('new-user')}}" method="POST">
            {{csrf_field()}}
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="form-group">
                <label for="">Personal Number</label>
                <input type="number" class="form-control" name="personalNumber" required>
            </div>
            <div class="form-group">
                <label for="">Role</label>
                <select name="role" class="form-control" required>
                    <option value="">Select role</option>
                    @foreach($roles as $role)
                        <option value="{{$role->id}}">{{$role->role}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">&nbsp;</label>
                <input type="submit" value="Save" class="btn btn-primary">
            </div>
        </form>
    </div>
@endsection