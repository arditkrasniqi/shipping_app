@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-12 col-sm-6 col-md-5">
            <h1>Package details</h1>
            <p>Name: {{$packages[0]->name}}</p>
            <p>Tracking Code: {{$packages[0]->trackingCode}}</p>
            <p>Description: {{$packages[0]->description}}</p>
            <p>Source Address: {{$packages[0]->source}}</p>
            <p>Destination Address: {{$packages[0]->destination}}</p>
            <hr>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($packages as $package)
                    <tr>
                        <td>{{$package->date}}</td>
                        <td>{{$package->status}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <hr>
            <form action="{{route('update-package')}}" method="POST">
                {{csrf_field()}}
                @method('PATCH')
                <div class="form-group">
                    <label for="">Update Status</label>
                    <textarea name="status" class="form-control"></textarea>
                    <input type="hidden" name="packageId" value="{{$packages[0]->id}}">
                </div>
                <div class="form-group">
                    <label for=""></label>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
