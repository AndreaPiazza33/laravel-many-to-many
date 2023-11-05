@extends('layouts.app')

@section('content-header')
    <h1 class="my-3">Crea Progetti</h1>
    <a href='{{ route('admin.projects.index') }}' class="btn btn-primary mt-3">Torna indietro</a>
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

        <form method="POST" action="{{ route('admin.projects.store') }}" class="row" enctype="multipart/form-data">
            @csrf

            <div class="col-12 mt-3">
                <label for="title" class="form-label ">Titolo</label>
                <input type="text" name="title" id="title"
                    class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-12 mt-3">
                <div class="d-flex align-items-center row">
                    <div class="col-10">
                        <label for="cover_image" class="form-label ">Immagine di Copertina</label>
                        <input type="file" name="cover_image" id="cover_image"
                            class="form-control @error('cover_image') is-invalid @enderror"
                            value="{{ old('cover_image') }}">
                        @error('cover_image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-2">
                        <img src="" class ="img-fluid" id="cover_image_preview" alt="">
                    </div>
                </div>
            </div>

            <div class="col-12 mt-3">
                <label for="type_id" class="form-label ">Tipologia</label>
                <select name="type_id" id="type_id" class="form-select @error('type_id') is-invalid @enderror">
                    <option value="">Nessuna Tipologia</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" @if (old('type_id') == $type->id) selected @endif>
                            {{ $type->name }}</option>
                    @endforeach
                </select>
                @error('type_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-12 mt-3">
                <div class="form-check @error('technologies') is-invalid @enderror">
                    @foreach ($technologies as $technology)
                        <input type="checkbox" name="technologies[]" id="technologies-{{ $technology->id }}"
                            value="{{ $technology->id }}" class="form-check-control"
                            @if (in_array($technology->id, old('technologies') ?? [])) checked @endif>
                        <label for="technologies-{{ $technology->id }}">{{ $technology->name }}</label>
                        <br>
                    @endforeach
                </div>
                @error('technologies')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-12 mt-3">
                <label for="description" class="form-label">Contenuto</label>
                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                    rows="5">{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            <div class="col-12 mt-3">
                <label for="link" class="form-label">Link</label>
                <input type="text" name="link" id="link" class="form-control @error('link') is-invalid @enderror"
                    value="{{ old('link') }}">
                @error('link')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div>
                <button class="btn btn-primary mx-5 mt-5">
                    Salva Progetto
                </button>
            </div>
    </div>

    </form>
@endsection

@section('scripts')
    <script type="text/javascript">
        const inputFileElement = document.getElementById('cover_image');
        const coverImagePreview = document.getElementById('cover_image_preview');

        inputFileElement.addEventListener('change', function() {
            const [file] = this.files;
            coverImagePreview.src = URL.createObjectURL(file)
        });
    </script>
@endsection
