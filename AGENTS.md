# AGENTS.md

## Cursor Cloud specific instructions

This is a single Laravel 13 application ("Cargo Management System") — PHP backend with Blade views, a Vite + Tailwind + Alpine frontend, and a SQLite database. It is not a monorepo.

### Runtime / setup gotchas

- PHP 8.4 is required, not 8.3. `composer.json` says `php: ^8.3`, but `composer.lock` pins Symfony 8.1 packages that require `php >=8.4.1`, so `composer install` fails on 8.3. PHP 8.4 (from the `ondrej/php` PPA) is preinstalled in the VM snapshot and is the default `php`.
- The dependency refresh (`composer install`, `npm install`) runs automatically on startup via the update script. `.npmrc` sets `ignore-scripts=true`, so npm never runs postinstall/build automatically — build assets explicitly (see below).
- Database is SQLite at `database/database.sqlite` (git-ignored via `database/.gitignore`). First-time setup (already done in the snapshot): `touch database/database.sqlite && php artisan migrate`. Re-run `php artisan migrate` if migrations change. `.env` is created from `.env.example` and `php artisan key:generate` has been run.

### Running the app

- One command for the full dev stack: `composer dev` (runs `php artisan serve`, `queue:listen`, `pail`, and `npm run dev` concurrently via `concurrently`).
- Or run pieces separately: `php artisan serve --host=0.0.0.0 --port=8000` and `npm run dev` (Vite HMR on 5173; it writes `public/hot`). If you don't run Vite, run `npm run build` first so Blade `@vite` finds built assets in `public/build`.

### Lint / test

- Lint/format: `./vendor/bin/pint` (use `./vendor/bin/pint --test` to check without writing). The repo currently has many pre-existing style violations, so `--test` reports failures out of the box.
- Tests: `php artisan test` (Pest). Tests use an in-memory SQLite DB (see `phpunit.xml`). Note: ~19 of 25 tests currently fail with `Call to undefined method App\Models\User::factory()` because `App\Models\User` does not use the `HasFactory` trait — this is a pre-existing application code issue, not an environment problem.

### Known pre-existing app bugs (not environment issues)

- Vehicle creation via the UI is broken: the form (`resources/views/vehicle/create.blade.php`) submits `registration_number`, but `VehicleController@store` validates `plate_number`, so submissions silently fail validation.
- New registrations default to the `customer` role; the customer dashboard (`dashboard.user`) is intentionally minimal. Admin/driver dashboards require a user whose `role` is `admin`/`driver` (set directly in the DB).
