@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="my-3 d-flex justify-content-end">
                <a href="{{ route('admin.projects.index')}}" class="btn btn-sm btn-primary">Tutti i progetti</a>
            </div>
        </div>
        <div class="col-12">
            <h1>Titolo</h1>
            <div class="border">{{ $project->name }}</div>
        </div>
        <div class="col-12 mt-5">
            <h3>Argomento </h3>
            <div class="border">{{ $project->topic }}</div>
        </div>
        <div class="col-12 mt-5">
            <h3>Link</h3>
            <div class="border">{{ $project->link_repository }}</div>
        </div>
        @if(isset($project->type->name))
        <div class="col-12 mt-5">
            <h3>Tipologia del progetto</h3>
            <div class="border">{{ $project->type->name }}</div>
        </div>
        @endif
        @if($project->img)
        <div class="col-12 mt-5">
            <h3>Copertina</h3>
            <div class="border">
                <img src="{{ asset('storage/'.$project->img)}}">
            </div>
        </div>
        @endif
        <div class="col-12 mt-5">
            <strong>Tecnologie utilizzate:</strong>
            @if($project->technologies)
                @foreach($project->technologies as $technology)
                    <a href="" class="badge text-bg-primary text-decoration-none">{{ $technology->name }}</a>
                @endforeach
            @endif
        </div>
    </div>
</div>

@endsection