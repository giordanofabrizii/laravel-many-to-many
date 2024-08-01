@extends('layouts.edit-create-type')

@section('form-action')
    {{ route('admin.types.update', $type) }}
@endsection

@section('method')
    @method('PUT')
@endsection

@section('name','Edit')

