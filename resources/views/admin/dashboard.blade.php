@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container mt-4">
    <h2>Admin Dashboard</h2>

    <div class="row">
        <div class="col-md-6">
            <h4>Cases Status Distribution</h4>
            <canvas id="statusChart" width="400" height="400"></canvas>
        </div>

        <div class="col-md-6">
            <h4>Upcoming Next Actions</h4>
            <ul>
                @foreach($upcomingActions as $action)
                    <li>{{ $action->action_date->format('F j, Y') }} - Case ID: {{ $action->case_id }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('statusChart').getContext('2d');
    const data = {
        labels: {!! json_encode(array_keys($statusCounts)) !!},
        datasets: [{
            label: 'Cases by Status',
            data: {!! json_encode(array_values($statusCounts)) !!},
            backgroundColor: ['#007bff', '#28a745', '#dc3545', '#ffc107'],
        }]
    };

    new Chart(ctx, {
        type: 'pie',
        data: data,
    });
</script>
@endsection
