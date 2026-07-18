<?php
use App\Models\User;
use App\Models\Driver;
use App\Models\Vehicle;

test('vehicle store accepts plate_number and cargo store persists required fields', function () {
    $admin = User::factory()->admin()->create();

    $this->actingAs($admin)
        ->post(route('vehicle.store'), [
            'plate_number' => 'XYZ 999',
            'type' => 'Van',
            'capacity' => 5,
            'status' => 'available',
        ])
        ->assertRedirect(route('vehicle.index'));

    $this->assertDatabaseHas('vehicles', ['plate_number' => 'XYZ 999']);

    $this->actingAs($admin)
        ->from(route('vehicle.create'))
        ->post(route('vehicle.store'), [
            'registration_number' => 'OLD 111',
            'type' => 'Van',
            'capacity' => 5,
            'status' => 'available',
        ])
        ->assertSessionHasErrors('plate_number');

    $driverUser = User::factory()->driver()->create();
    $driver = Driver::create([
        'user_id' => $driverUser->id,
        'name' => 'Driver One',
        'license_number' => 'LIC-99',
        'phone' => '0700000000',
        'availability' => 'available',
    ]);

    $vehicle = Vehicle::first();

    $this->actingAs($admin)
        ->post(route('cargo.store'), [
            'tracking_number' => 'TRK1',
            'origin' => 'Dar',
            'destination' => 'Arusha',
            'weight' => 50,
            'cargo_type' => 'Food',
            'driver_id' => $driver->id,
            'vehicle_id' => $vehicle->id,
            'status' => 'pending',
        ])
        ->assertRedirect(route('cargo.index'));

    $this->assertDatabaseHas('cargos', [
        'tracking_number' => 'TRK1',
        'user_id' => $admin->id,
        'weight' => 50,
        'cargo_type' => 'Food',
    ]);
});

test('driver dashboard loads when driver profile exists', function () {
    $driverUser = User::factory()->driver()->create();
    Driver::create([
        'user_id' => $driverUser->id,
        'name' => $driverUser->name,
        'license_number' => 'LIC-22',
        'phone' => '0711111111',
        'availability' => 'available',
    ]);

    $this->actingAs($driverUser)
        ->get(route('dashboard'))
        ->assertOk();
});

test('customer dashboard loads', function () {
    $customer = User::factory()->create();

    $this->actingAs($customer)
        ->get(route('dashboard'))
        ->assertOk()
        ->assertSee('Customer Dashboard');
});
