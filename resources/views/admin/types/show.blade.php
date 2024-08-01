@extends('layouts.admin')

@section('custom-js')
    @vite('resources/js/delete.js')
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <article class="col-12">
                <h3 class=" my-2 p-2 rounded d-inline-block" style="background:  {{ $type->color }}">{{ $type->name }}</h3>
                <h1>{{ $type->title }} </h1>
                <a class="btn btn-warning" href="{{route('admin.types.edit',compact('type'))}}">
                    Edit
                </a>
                <form id="delete-form" class="d-inline" action="{{route('admin.types.destroy',$type)}}" method="POST" type_title="{{$type->title}}">
                    @method('DELETE')
                    @csrf

                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </article>
        </div>
    </div>

@endsection
