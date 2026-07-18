@extends('layouts.app')

@section('content')

<div class="mb-4">
    <h2 class="fw-bold">
        <i class="bi bi-pencil-square"></i>
        Edit Vehicle
    </h2>
    <p class="text-muted">Update vehicle information</p>
</div>

<div class="card p-4">
    <form method="POST" action="{{ route('vehicle.update', $vehicle) }}">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Plate Number</label>
                <input type="text"
                    name="plate_number"
                    class="form-control"
                    value="{{ old('plate_number', $vehicle->plate_number) }}">
                @error('plate_number')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Vehicle Type</label>
                <select name="type" class="form-select">
                    <option value="Truck" @selected(old('type', $vehicle->type) === 'Truck')>Truck</option>
                    <option value="Van" @selected(old('type', $vehicle->type) === 'Van')>Van</option>
                    <option value="Trailer" @selected(old('type', $vehicle->type) === 'Trailer')>Trailer</option>
                </select>
                @error('type')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Capacity</label>
                <input type="number"
                    name="capacity"
                    class="form-control"
                    min="1"
                    value="{{ old('capacity', $vehicle->capacity) }}">
                @error('capacity')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="available" @selected(old('status', $vehicle->status) === 'available')>Available</option>
                    <option value="busy" @selected(old('status', $vehicle->status) === 'busy')>Busy</option>
                    <option value="maintenance" @selected(old('status', $vehicle->status) === 'maintenance')>Maintenance</option>
                </select>
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mt-4">
            <button class="btn btn-success">
                <i class="bi bi-check-circle"></i>
                Update Vehicle
            </button>
            <a href="{{ route('vehicle.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>

@endsection
