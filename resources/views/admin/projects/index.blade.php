@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content-header')
    <h1 class="my-3">Lista Progetti</h1>
    <a href='{{ route('admin.projects.create') }}' class="btn btn-primary mt-3">Crea Progetto</a>
@endsection

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Type</th>
                    <th scope="col">Technologies</th>
                    <th scope="col">Description</th>
                    <th scope="col">Link</th>
                    <th scope="col">Slug</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $project)
                    <tr>
                        <th scope="row">{{ $project->id }}</th>
                        <td>{{ $project->title }}</td>
                        <td>{!! $project->getTypeBadge() !!}</td>
                        <td>{!! $project->getTechnologyBadges() !!}</td>
                        <td>{{ $project->description }}</td>
                        <td><a href="#">{{ $project->link }}</a></td>
                        <td>{{ $project->slug }}</td>
                        <td>
                            <a href="{{ route('admin.projects.show', $project) }}">
                                <i class="fa-solid fa-up-right-from-square"></i>
                            </a>

                            <a href="{{ route('admin.projects.edit', $project) }}">
                                <i class="fa-solid fa-pencil"></i>
                            </a>

                            <a href="javascript:void(0)" class="text-danger" data-bs-toggle="modal"
                                data-bs-target="#delete-post-modal-{{ $project->id }}">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5"><i>Non sono presenti progetti</i></td>
                    </tr>
                @endforelse

            </tbody>
        </table>

        {{ $projects->links('pagination::bootstrap-5') }}
    </div>
@endsection

@section('modals')
    @foreach ($projects as $project)
        <div class="modal fade" id="delete-post-modal-{{ $project->id }}" data-bs-backdrop="static"
            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Conferma eliminazione</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Vuoi eliminare questo progetto "{{ $project->title }}"?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                        <form method="POST" action="{{ route('admin.projects.destroy', $project) }}">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger">Elimina</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
