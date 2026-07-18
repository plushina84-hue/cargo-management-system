@extends('layouts.app')

@section('content')

<div class="mb-4">
    <h2 class="fw-bold">
        <i class="bi bi-bell"></i>
        Notifications
    </h2>
    <p class="text-muted">System updates and alerts</p>
</div>

<div class="row g-4">
    @forelse($notifications as $notification)
        <div class="col-md-6">
            <div class="card p-4">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5>
                            {{ $notification->data['title'] ?? 'Notification' }}
                        </h5>
                        <p class="text-muted">
                            {{ $notification->data['message'] ?? 'No message' }}
                        </p>
                        <small>
                            {{ $notification->created_at->diffForHumans() }}
                        </small>
                    </div>
                    <i class="bi bi-bell-fill fs-2 text-primary"></i>
                </div>
            </div>
        </div>
    @empty
        <div class="card p-4 text-center">
            <h5>No notifications available</h5>
        </div>
    @endforelse
</div>

@endsection
