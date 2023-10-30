@extends('layouts.guest')

@section('content')
    <section class="container mt-5">
        <h1>{{ $title }}</h1>
        <div class="row g-3">
            @forelse ($projects as $project)
                <div class="col-3">
                    <div class="card h-100">
                        <div class="card-header">
                            {{ $project->title }}
                        </div>
                        <div class="card-body">
                            {{ $project->description }}
                            <hr>
                            <a href="javascript:void(0)">{{ $project->link }}</a>

                        </div>
                        <div class="card-footer">
                            <a class="btn btn-primary" href="{{ route('guest.projects.detail', $project) }}">Vai al
                                dettaglio</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <h2>Non sono presenti Progetti</h2>
                </div>
            @endforelse
        </div>


        {{ $projects->links('pagination::bootstrap-5') }}
    </section>
@endsection
