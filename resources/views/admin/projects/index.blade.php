@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 mt-5">
            <div class="d-flex justify-content-between align-items-center">
                <h1>I miei progetti</h1>
                <div>
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.projects.create')}}">Aggiungi progetto</a>    
                </div>
            </div>
        </div>
        <div class="col-12 mt-5">
            @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Link</th>
                        <th>Strumenti</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $project)
                        <tr>
                            <td>{{ $project->id }}</td>
                            <td>{{ $project->name }}</td>
                            <td>{{ $project->link_repository }}</td>
                            <td>
                                <a href="{{ route('admin.projects.show', $project->id)}}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.projects.edit', $project->id)}}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form class="d-inline-block" action="{{ route('admin.projects.destroy', $project->id)}}" onsubmit="return confirm('Sei sicuro di voler eliminare questo progetto?')" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection