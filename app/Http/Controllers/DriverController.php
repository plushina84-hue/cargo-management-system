<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class DriverController extends Controller
{
    public function index()
    {
        $drivers = Driver::with('user')
            ->latest()
            ->get();

        return view('driver.index', compact('drivers'));
    }

    public function create()
    {
        return view('driver.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'license_number' => 'required|string|max:255|unique:drivers,license_number',
            'phone' => 'required|string|max:255',
            'password' => ['required', Password::defaults()],
            'availability' => 'required|in:available,busy',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'role' => 'driver',
        ]);

        Driver::create([
            'user_id' => $user->id,
            'name' => $validated['name'],
            'license_number' => $validated['license_number'],
            'phone' => $validated['phone'],
            'availability' => $validated['availability'],
        ]);

        return redirect()
            ->route('driver.index')
            ->with('success', 'Driver created successfully');
    }

    public function show(Driver $driver)
    {
        return redirect()->route('driver.edit', $driver);
    }

    public function edit(Driver $driver)
    {
        return view('driver.edit', compact('driver'));
    }

    public function update(Request $request, Driver $driver)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'license_number' => 'required|string|max:255|unique:drivers,license_number,'.$driver->id,
            'availability' => 'required|in:available,busy',
        ]);

        $driver->update($validated);

        if ($driver->user) {
            $driver->user->update([
                'name' => $validated['name'],
            ]);
        }

        return redirect()
            ->route('driver.index')
            ->with('success', 'Driver updated successfully');
    }

    public function destroy(Driver $driver)
    {
        if ($driver->user) {
            $driver->user->delete();
        }

        $driver->delete();

        return redirect()
            ->route('driver.index')
            ->with('success', 'Driver deleted successfully');
    }
}
