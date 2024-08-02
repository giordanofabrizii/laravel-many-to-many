@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 px-4 py-2 d-flex justify-content-end">
                <a class="mx-2" href="{{ Route('admin.projects.deleted') }}">
                    <button class="btn btn-secondary">Bin</button>
                </a>
                <a href="{{ Route('admin.projects.create') }}">
                    <button class="btn btn-primary">New Project</button>
                </a>
            </div>
        </div>

        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Image Url</th>
                        <th scope="col">Type</th>
                        <th scope="col">Technologies</th>
                        <th scope="col">Buttons</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $project->title }}</td>
                            <td>{{ $project->image }}</td>
                            <td>{{ $project->type->name }}</td>
                            <td>
                                @forelse($project->technologies as $index => $technology)
                                    {{ $technology->name }}

                                    @if ($index != count($project->technologies) - 1)
                                        ,
                                    @endif
                                    
                                @empty
                                    Nessuna tecnologia
                                @endforelse
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{ Route('admin.projects.show', compact('project')) }}">Show</a>
                                <a class="btn btn-warning" href="{{route('admin.projects.edit',compact('project'))}}">Edit</a>
                                <form id="delete-form" class="d-inline" action="{{route('admin.projects.destroy',$project)}}" method="POST" project_title="{{$project->title}}">
                                    @method('DELETE')
                                    @csrf

                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
