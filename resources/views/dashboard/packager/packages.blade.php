@extends('layouts.dashboard')
@section('content')
    <h1>Packages</h1>
    <div class="row">
        <div class="col-12 col-sm-6 col-md-5">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Open</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($packages as $package)
                        <tr>
                            <td>{{$package->name}}</td>
                            <td>
                                <a href="{{route('package',$package->trackingCode)}}"><i class="fa fa-external-link"></i></a>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
