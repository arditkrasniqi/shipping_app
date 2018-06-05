@extends('layouts.dashboard')
@section('content')
    <h1>New Package</h1>
    <div class="col-12 col-sm-6 col-md-5">
        <form action="{{route('new-package')}}" method="POST">
            {{csrf_field()}}
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <input type="text" class="form-control" name="description" required>
            </div>
            <div class="form-group">
                <label for="">Source Address</label>
                <input type="text" class="form-control" name="source" required>
            </div>
            <div class="form-group">
                <label for="">Destination Address</label>
                <input type="text" class="form-control" name="destination" required>
            </div>
            <div class="form-group">
                <label for="">&nbsp;</label>
                <input type="submit" value="Save" class="btn btn-primary">
            </div>
        </form>
    </div>
    @endsection
