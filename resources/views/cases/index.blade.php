@extends('layouts.app')

@section('title', 'View Cases')

@section('content')
<div class="container mt-4">
    <h2>All Cases</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Case Title</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cases as $case)
                <tr>
                    <td>{{ $case->id }}</td>
                    <td>{{ $case->title }}</td>
                    <td>{{ $case->status }}</td>
                    <td>{{ $case->created_at->format('F j, Y') }}</td>
                    <td>
                        <a href="{{ route('cases.show', $case->id) }}" class="btn btn-sm btn-primary">View</a>
                        <!-- Add edit/delete if needed -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
