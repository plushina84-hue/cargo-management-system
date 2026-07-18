<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Driver;
use App\Models\Vehicle;
use App\Notifications\CargoAssignedNotification;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    public function index()
    {
        $cargos = Cargo::with(['driver', 'vehicle'])
            ->latest()
            ->get();

        return view('cargo.index', compact('cargos'));
    }

    public function create()
    {
        $drivers = Driver::where('availability', 'available')->get();
        $vehicles = Vehicle::where('status', 'available')->get();

        return view('cargo.create', compact('drivers', 'vehicles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tracking_number' => 'required|unique:cargos,tracking_number',
            'origin' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'weight' => 'required|integer|min:1',
            'cargo_type' => 'required|string|max:255',
            'description' => 'nullable|string',
            'driver_id' => 'required|exists:drivers,id',
            'vehicle_id' => 'required|exists:vehicles,id',
            'status' => 'nullable|in:pending,picked,in_transit,delivered',
        ]);

        $cargo = Cargo::create([
            ...$validated,
            'user_id' => auth()->id(),
            'status' => $validated['status'] ?? 'pending',
        ]);

        $this->notifyDriver($cargo);

        return redirect()
            ->route('cargo.index')
            ->with('success', 'Cargo created successfully');
    }

    public function show(Cargo $cargo)
    {
        return redirect()->route('cargo.edit', $cargo);
    }

    public function edit(Cargo $cargo)
    {
        $drivers = Driver::all();
        $vehicles = Vehicle::all();

        return view('cargo.edit', compact('cargo', 'drivers', 'vehicles'));
    }

    public function update(Request $request, Cargo $cargo)
    {
        $validated = $request->validate([
            'tracking_number' => 'required|unique:cargos,tracking_number,'.$cargo->id,
            'origin' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'driver_id' => 'required|exists:drivers,id',
            'vehicle_id' => 'required|exists:vehicles,id',
            'status' => 'required|in:pending,picked,in_transit,delivered',
        ]);

        $previousDriverId = $cargo->driver_id;

        $cargo->update($validated);

        if ($previousDriverId != $cargo->driver_id) {
            $this->notifyDriver($cargo);
        }

        return redirect()
            ->route('cargo.index')
            ->with('success', 'Cargo updated successfully');
    }

    public function updateStatus(Request $request, Cargo $cargo)
    {
        $request->validate([
            'status' => 'required|in:pending,picked,in_transit,delivered',
        ]);

        $cargo->update([
            'status' => $request->status,
        ]);

        return redirect()->route('cargo.index');
    }

    public function driverStatus(Request $request, Cargo $cargo)
    {
        $request->validate([
            'status' => 'required|in:pending,picked,in_transit,delivered',
        ]);

        $cargo->update([
            'status' => $request->status,
        ]);

        return redirect()
            ->route('dashboard')
            ->with('success', 'Cargo status updated');
    }

    public function destroy(Cargo $cargo)
    {
        $cargo->delete();

        return redirect()
            ->route('cargo.index')
            ->with('success', 'Cargo deleted');
    }

    private function notifyDriver(Cargo $cargo): void
    {
        $driver = Driver::with('user')->find($cargo->driver_id);

        if ($driver?->user) {
            $driver->user->notify(new CargoAssignedNotification($cargo));
        }
    }
}
