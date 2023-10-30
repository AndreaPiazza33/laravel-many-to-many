@extends('layouts.guest')

@section('content')
    <section class="container mt-5">
        <div class="row g-3">
            <div class="col-12">
                <div class="card h-100">
                    <div class="card-header">
                        {{ $project->title }}
                    </div>
                    <div class="card-body">
                        {{ $project->description }}
                        <hr>
                        <a href="javascript:void(0)">{{ $project->link }}</a>
                    </div>
                </div>
            </div>
    </section>
@endsection
