@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 mt-5">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Tipologie di progetto</h1>
                <div>
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.types.create')}}">Aggiungi Tipologia</a>    
                </div>
            </div>
        </div>
        <div class="col-12 mt-5">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($types as $type)
                        <tr>
                            <td>{{ $type->id }}</td>
                            <td>{{ $type->name }}</td>
                            <td>
                                <a href="{{ route('admin.types.show', $type->id)}}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <form class="d-inline-block" action="{{ route('admin.types.destroy', $type->id)}}" onsubmit="return confirm('Sei sicuro di voler eliminare questa tipologia?')" method="POST">
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