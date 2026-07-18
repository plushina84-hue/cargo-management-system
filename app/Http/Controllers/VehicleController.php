<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::latest()->get();

        return view('vehicle.index', compact('vehicles'));
    }

    public function create()
    {
        return view('vehicle.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'plate_number' => 'required|string|max:255|unique:vehicles,plate_number',
            'type' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'status' => 'required|in:available,busy,maintenance',
        ]);

        Vehicle::create($validated);

        return redirect()
            ->route('vehicle.index')
            ->with('success', 'Vehicle created successfully');
    }

    public function show(Vehicle $vehicle)
    {
        return redirect()->route('vehicle.edit', $vehicle);
    }

    public function edit(Vehicle $vehicle)
    {
        return view('vehicle.edit', compact('vehicle'));
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $validated = $request->validate([
            'plate_number' => 'required|string|max:255|unique:vehicles,plate_number,'.$vehicle->id,
            'type' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'status' => 'required|in:available,busy,maintenance',
        ]);

        $vehicle->update($validated);

        return redirect()
            ->route('vehicle.index')
            ->with('success', 'Vehicle updated successfully');
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();

        return redirect()
            ->route('vehicle.index')
            ->with('success', 'Vehicle deleted successfully');
    }
}
