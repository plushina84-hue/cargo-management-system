<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Driver;
use App\Models\Vehicle;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role === 'admin') {
            $totalCargo = Cargo::count();
            $pendingCargo = Cargo::where('status', 'pending')->count();
            $deliveredCargo = Cargo::where('status', 'delivered')->count();
            $totalDrivers = Driver::count();
            $totalVehicles = Vehicle::count();
            $recentCargo = Cargo::with(['driver', 'vehicle'])
                ->latest()
                ->take(5)
                ->get();

            return view('dashboard.admin', compact(
                'totalCargo',
                'pendingCargo',
                'deliveredCargo',
                'totalDrivers',
                'totalVehicles',
                'recentCargo'
            ));
        }

        if ($user->role === 'driver') {
            $driver = $user->driver;

            if (! $driver) {
                return view('dashboard.driver', [
                    'cargos' => collect(),
                    'assignedCargo' => 0,
                    'inTransit' => 0,
                    'delivered' => 0,
                ]);
            }

            $cargos = Cargo::where('driver_id', $driver->id)
                ->latest()
                ->get();

            $assignedCargo = $cargos->count();
            $inTransit = $cargos->where('status', 'in_transit')->count();
            $delivered = $cargos->where('status', 'delivered')->count();

            return view('dashboard.driver', compact(
                'cargos',
                'assignedCargo',
                'inTransit',
                'delivered'
            ));
        }

        $cargos = Cargo::with(['driver', 'vehicle'])
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        $totalCargo = $cargos->count();
        $inTransit = $cargos->where('status', 'in_transit')->count();
        $delivered = $cargos->where('status', 'delivered')->count();

        return view('dashboard.customer', compact(
            'cargos',
            'totalCargo',
            'inTransit',
            'delivered'
        ));
    }
}
