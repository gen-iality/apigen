@extends('layout')

@section('content')
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>evento</th>
                <th>nombre</th>
                <th>tikect</th>
            </tr>                            
        </thead>
        <tbody>
            <tr>
                <td>{{ $event }}</td>
                <td>{{ $eventuser }}</td>
                <td>{{ $tikect_id }}</td>
            </tr>
        </tbody>
    </table>
@endsection