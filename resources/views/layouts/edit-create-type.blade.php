@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <form action="@yield('form-action')" method="POST">
                    @yield('method')
                    @csrf

                    <div class="form-group">
                        <label for="name">type Title</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" value="{{ old('title', $type->name) }}">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="color">color Url</label>
                        <input type="color" class="form-control" name="color" id="color" placeholder="Enter url" value="{{ old('color', $type->color) }}">
                        @error('color')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mt-2">@yield('name')</button>
                </form>
            </div>
        </div>
    </div>
@endsection
