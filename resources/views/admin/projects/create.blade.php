@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 mt-5">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Aggiungi un Progetto</h1>
                <div>
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.projects.create')}}">Tutti i progetti</a>    
                </div>
            </div>
        </div>
        <div class="col-12">
            @if($errors->any())
                <div class=" mt-3 w-50 alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('admin.projects.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mt-5 d-flex flex-column w-25">
                    <label class="control-label">Titolo</label>
                    <input class="form-control @error('name')is-invalid @enderror" type="text" id="name" name="name" placeholder="Titolo" value="{{ old('name') }}" required>
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-3 d-flex flex-column w-25">
                    <label class="control-label">Link della repository</label>
                    <input class="form-control @error('link_repository') is-invalid @enderror" type="text" id="link_repository" name="link_repository" placeholder="link" value="{{ old('link_repository') }}" required>
                    @error('link_repository')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- caricamento img --}}
                <div class="form-group mt-3 d-flex flex-column w-25">
                    <label class="control-label">Immagine</label>
                    <input class="form-control" type="file" id="img" name="img" placeholder="Seleziona un file">
                    @error('img')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-3 d-flex flex-column w-25">
                    <label class="control-label">Argomento</label>
                    <input class="form-control" type="text" id="topic" name="topic" placeholder="Argomento" value="{{ old('topic') }}">
                </div>
                {{-- tipologia di progetto --}}
                <div class="form-group mt-3 d-flex flex-column w-25">
                    <label class="control-label">Tipo di progetto</label>
                    <select class="form-control" name="type_id" id="type_id">
                        <option value="">Seleziona il tipo di progetto</option>
                        @foreach($types as $type)
                            <option value="{{ $type->id }}" {{ $type->id == old('type_id') ? 'selected' : '' }}>{{ $type->name }}</option>
                        @endforeach
                    </select>
                    @error('type_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- selezione delle tecnologie --}}
                <div class="form-group mt-3">
                    <p>Seleziona le tecnologie utilizzate</p>
                    @foreach($technologies as $technology)
                        <div class="form-check @error('technologies') is-invalid @enderror">
                            <input type="checkbox" name="technologies[]" value="{{ $technology->id }}" class="form-check-input" {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}>
                            <label class="form-check-label me-3">{{ $technology->name }}</label>
                        </div>
                    @endforeach
                    @error('technologies')
                        <div class="text-danger"> {{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-sm btn-success">Aggiungi</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection