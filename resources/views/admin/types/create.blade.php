@extends('layouts.edit-create-type')

@section('form-action')
    {{ route('admin.types.store') }}
@endsection

@section('name','Create')
