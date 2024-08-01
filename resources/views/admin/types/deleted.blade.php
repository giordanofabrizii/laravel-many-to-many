@extends('layouts.admin')

@section('content')

    @if (count($types) == 0)
        <h1>No deleted types</h1>
    @else
        <div class="container">
            <div class="row">
            @foreach ($types as $type)
                <article class="col-6 d-flex flex-column">
                    <h3 class=" my-2 p-2 rounded d-inline-block" style="background:  {{ $type->color }}">{{ $type->name }}</h3>
                    <h1>{{ $type->title }} </h1>
                    <div class="py-2">
                        <form action="{{ route('admin.type.restore', ['type' => $type->id]) }}" method="POST" class="d-inline-block" data_type_id="{{ $type->id }}" data_type_nome="{{ $type->name }}">
                            @method('PATCH')
                            @csrf

                            <button type="submit" class="btn btn-primary">Ripristina</button>
                        </form>
                        <form action="{{ route('admin.type.permdelete', ['type' => $type->id]) }}" method="POST" class="d-inline-block" data_type_id="{{ $type->id }}" data_type_nome="{{ $type->name }}">
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

