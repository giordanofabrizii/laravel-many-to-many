@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <form action="@yield('form-action')" method="POST" enctype="multipart/form-data">
                    @yield('method')
                    @csrf

                    <div class="form-group">
                        <label for="title">Project Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Enter title" value="{{ old('title', $project->title) }}">
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Image Url</label>
                        <input type="file" class="form-control" name="image" id="image" placeholder="Enter url" value="{{ old('image', $project->image) }}">
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="type_id">Project Type</label>
                        <select name="type_id" id="type_id" class="form-control">
                            @foreach ($types as $type)
                                <option
                                {{ ($type->id == old("type_id", $project->type_id)) ? "selected" : ""}}
                                value="{{$type->id}}">{{ $type->name }} </option>
                            @endforeach
                        </select>
                        @error('type_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="technology_id">Project Technologies</label>
                        <div class="customChechBoxHolder">
                            @foreach ($technologies as $technology)
                                <input type="checkbox" class="btn-check" value="{{ $technology->id }}" name="technologies[]" id="technology-check-{{ $technology->id }}" autocomplete="off"
                                {{ in_array($technology->id, old('technologies', $project->technologies->pluck('id')->toArray())) ? "checked" : ""}}>
                                <label class="btn btn-outline-primary" for="technology-check-{{$technology->id}}">{{ $technology->name }}</label>
                            @endforeach
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">@yield('name')</button>
                </form>
            </div>
        </div>
    </div>
@endsection
