@extends('layouts.app')

@section('title', 'Case Details')

@section('content')
<div class="container mt-4">
    <h2>Case Details - {{ $case->case_title }}</h2>
    <p><strong>Case Number:</strong> {{ $case->case_number }}</p>
    <p><strong>Status:</strong> {{ $case->status }}</p>
    <p><strong>Client Name:</strong> {{ $case->client_name }}</p>
    <p><strong>Case Description:</strong> {{ $case->case_description }}</p>
    <!-- Add more fields as needed -->
    <a href="{{ route('cases.index') }}" class="btn btn-secondary mt-3">Back to Cases</a>
</div>
@endsection
