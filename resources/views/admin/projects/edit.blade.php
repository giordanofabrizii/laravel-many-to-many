@extends('layouts.edit-create')

@section('form-action')
    {{ route('admin.projects.update', $project) }}
@endsection

@section('method')
    @method('PUT')
@endsection

@section('name','Edit')

