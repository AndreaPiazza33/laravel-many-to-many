@extends('layouts.app')

@section('content-header')
    <h1>{{ $project->title }}</h1>
    <a href='{{ route('admin.projects.index') }}' class="btn btn-primary mt-3">Torna alla lista</a>

    <a href='{{ route('admin.projects.edit', $project) }}' class="btn btn-primary mt-3">Modifica il progetto</a>
@endsection

@section('content')
    <header class="container py-5">
    </header>
    <div class="container mt-3">
        <p>
        <h3>Description</h3><br>
        {{ $project->description }}
        </p>
        <hr>
        <p>
        <h3>Type</h3><br>
        {!! $project->getTypeBadge() !!}
        </p>
        <hr>
        <p>
        <h3>Technologies</h3><br>
        {!! $project->getTechnologyBadges() !!}
        </p>
        <hr>
        <p>
        <h3>Slug</h3><br>
        {{ $project->slug }}
        </p>
        <hr>
        <p>
        <h3>Created at</h3><br>
        {{ $project->created_at }}
        </p>
        <hr>
        <p>
        <h3>Updated at</h3><br>
        {{ $project->updated_at }}
        </p>
    </div>
@endsection
