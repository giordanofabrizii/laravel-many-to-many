@extends('layouts.edit-create')

@section('form-action')
    {{ route('admin.projects.store') }}
@endsection

@section('name','Create')
