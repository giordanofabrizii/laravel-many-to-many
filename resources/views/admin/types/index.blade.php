@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 px-4 py-2 d-flex justify-content-end">
                <a class="mx-2" href="{{ Route('admin.types.deleted') }}">
                    <button class="btn btn-secondary">Bin</button>
                </a>
                <a href="{{ Route('admin.types.create') }}">
                    <button class="btn btn-primary">New type</button>
                </a>
            </div>
        </div>

        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Color</th>
                        <th scope="col">Buttons</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($types as $type)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $type->name }}</td>
                            <td>{{ $type->color }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ Route('admin.types.show', compact('type')) }}">Show</a>
                                <a class="btn btn-warning" href="{{route('admin.types.edit',compact('type'))}}">Edit</a>
                                <form id="delete-form" class="d-inline" action="{{route('admin.types.destroy',$type)}}" method="POST" type_title="{{$type->name}}">
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
