@extends('layouts.app')

@section('content-header')
    <h1 class="my-3">Modifica Progetti</h1>
    <a href="{{ route('admin.projects.index') }}" class="btn btn-primary mt-3">Torna indietro</a>

    <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-primary mt-3">Vai ai dettagli</a>
@endsection

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                Correggi i seguenti errori
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <div class="container">
        <form method="POST" action="{{ route('admin.projects.update', $project) }}" class="row">
            @method('PATCH')
            @csrf
            <div class="col-12 mt-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $project->tile }}">
            </div>

            <div class="col-12 mt-3">
                <label for="type_id" class="form-label ">Tipologia</label>
                <select name="type_id" id="type_id" class="form-select @error('type_id') is-invalid @enderror">
                    <option value="">Nessuna Tipologia</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" @if (old('type_id') ?? $project->type_id == $type->id) selected @endif>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
                @error('type_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-12 mt-3">
                <label for="description" class="form-label">Contenuto</label>
                <textarea name="description" id="description" class="form-control" rows="5"></textarea>
            </div>

            <div class="col-12 mt-3">
                <label for="link" class="form-label">Link</label>
                <input type="text" name="link" id="link" class="form-control" value="{{ $project->link }}">
            </div>

            <div>
                <button class="btn btn-primary mx-5 mt-5">
                    Modifica Progetto
                </button>
            </div>
    </div>

    </form>
@endsection
