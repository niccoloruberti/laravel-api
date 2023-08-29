@extends('layouts.admin')

@section('content')

<div class="container my-3">
    <div class="row">
        @foreach($technology->projects as $project)
        <div class="col-4">
            <div class="card">
                <img class="img-fluid" src="{{ asset('storage/' . $project->img)}}">
                <div class="card-body">
                    <h5>{{ $project->name }}</h5>
                    <p>Link repository: <a>{{ $project->link_repository }}</a></p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection