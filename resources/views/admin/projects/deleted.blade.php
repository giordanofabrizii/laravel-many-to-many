@extends('layouts.admin')

@section('content')

    @if (count($projects) == 0)
        <h1>No deleted projects</h1>
    @else
        <div class="container">
            <div class="row">
            @foreach ($projects as $project)
                <article class="col-6 d-flex flex-column">
                    <h1>{{ $project->title }}</h1>
                    <img class="w-75" src="{{ $project->image }}" alt="{{ $project->nome }} img">
                    <div class="py-2">
                        <form action="{{ route('admin.project.restore', ['project' => $project->id]) }}" method="POST" class="d-inline-block" data_project_id="{{ $project->id }}" data_project_nome="{{ $project->nome }}">
                            @method('PATCH')
                            @csrf

                            <button type="submit" class="btn btn-primary">Ripristina</button>
                        </form>
                        <form action="{{ route('admin.project.permdelete', ['project' => $project->id]) }}" method="POST" class="d-inline-block" data_project_id="{{ $project->id }}" data_project_nome="{{ $project->nome }}">
                            @method('DELETE')
                            @csrf

                            <button type="submit" class="btn btn-danger">Elimina definitivamente</button>
                        </form>
                    </div>
                </article>
                @endforeach
            </div>

        </div>
    @endif

@endsection

