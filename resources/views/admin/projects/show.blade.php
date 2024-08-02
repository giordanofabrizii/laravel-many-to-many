@extends('layouts.admin')

@section('custom-js')
    @vite('resources/js/delete.js')
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <article class="col-12">
                {{-- <img src="{{$project->image}}" alt=""> --}}
                <img class="img-fluid" src="{{ asset('storage/' . $project->image) }}" alt="">
                <div>
                    <h3 class=" my-2 p-2 rounded d-inline-block" style="background:  {{ $project->type->color }}">{{ $project->type->name }}</h3>
                </div>
                <div>
                    @forelse($project->technologies as $index => $technology)
                        {{ $technology->name }}

                        @if ($index != count($project->technologies) - 1)
                            ,
                        @endif

                    @empty
                        Nessuna tecnologia
                    @endforelse
                </div>
                <h1>{{ $project->title }} </h1>
                <a class="btn btn-warning" href="{{route('admin.projects.edit',compact('project'))}}">
                    Edit
                </a>
                <form id="delete-form" class="d-inline" action="{{route('admin.projects.destroy',$project)}}" method="POST" project_title="{{$project->title}}">
                    @method('DELETE')
                    @csrf

                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </article>
        </div>
    </div>

@endsection
