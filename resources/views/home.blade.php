@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="p-5 mb-4 bg-dark rounded-3 border border-secondary">
    <div class="container-fluid py-5 text-center">
        <h1 class="display-4 fw-bold">Welcome to LegalMindAI</h1>
        <p class="fs-5 text-muted">
            A smart legal case management system powered by AI to make your legal workflow 8 times faster.
        </p>
        <div class="d-grid gap-3 col-6 mx-auto mt-4">
            <a href="{{ route('cases.create') }}" class="btn btn-outline-light btn-lg">File New Case</a>
            <a href="{{ route('cases.index') }}" class="btn btn-outline-success btn-lg">View Cases</a>
            <a href="#" class="btn btn-outline-info btn-lg">AI Legal Guidance</a>
        </div>
    </div>
</div>
@endsection
