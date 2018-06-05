@extends('layouts.dashboard')
@section('content')
    <h1>Track Package</h1>
    <div class="row">
        <div class="col-12 col-sm-6">
            <form action="{{route('package-details')}}" method="POST">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-8">
                        <label for="">Tracking Code</label>
                        <input type="text" class="form-control" name="trackingCode">
                    </div>
                    <div class="col-4">
                        <label for="" class="block">&nbsp;</label>
                        <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
            <hr>
            @if(isset($packages))
                <h1>Package details</h1>
                <p>Name: {{$packages[0]->name}}</p>
                <p>Tracking Code: {{$packages[0]->trackingCode}}</p>
                <p>Description: {{$packages[0]->description}}</p>
                <p>Source Address: {{$packages[0]->source}}</p>
                <p>Destination Address: {{$packages[0]->destination}}</p>
                
            <br/>
            <br/>
            <br/>
            <h3>Tracking Stations</h3>
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
            @endif
        </div>
    </div>
@endsection
