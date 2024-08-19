@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 px-4 py-2 d-flex justify-content-end">
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
                    <th scope="col">Name</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($technologies as $technology)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $technology->name }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection
