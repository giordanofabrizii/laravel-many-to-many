@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Birth Date</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($teammates as $teammate)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $teammate->name }}</td>
                        <td>{{ $teammate->date_of_birth }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection
