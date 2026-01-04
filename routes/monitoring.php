<?php

use Illuminate\Support\Facades\Route;

// Health check endpoint
Route::get('/health', function () {
    return response()->json([
        'status' => 'ok',
        'timestamp' => now()->toISOString(),
        'version' => app()->version(),
        'environment' => app()->environment(),
        'timezone' => config('app.timezone'),
        'debug' => config('app.debug'),
        'database' => [
            'status' => \DB::connection()->getPdo() ? 'connected' : 'disconnected',
        ],
        'cache' => [
            'status' => \Cache::driver('redis')->ping() ? 'connected' : 'disconnected',
        ],
        'storage' => [
            'status' => is_writable(storage_path()) ? 'writable' : 'not writable',
        ],
    ]);
});

// Metrics endpoint
Route::get('/metrics', function () {
    return response()->json([
        'timestamp' => now()->toISOString(),
        'application' => [
            'name' => config('app.name'),
            'version' => app()->version(),
            'environment' => app()->environment(),
            'debug' => config('app.debug'),
        ],
        'database' => [
            'users' => \App\Models\User::count(),
            'contents' => \App\Models\Contenu::count(),
            'payments' => \App\Models\Payment::count(),
            'comments' => \App\Models\Commentaire::count(),
        ],
        'system' => [
            'memory_usage' => memory_get_usage(true),
            'memory_peak' => memory_get_peak_usage(true),
            'uptime' => shell_exec('uptime -p 2>/dev/null') ?: 'N/A',
            'disk_usage' => [
                'total' => disk_total_space('/'),
                'free' => disk_free_space('/'),
                'used' => disk_total_space('/') - disk_free_space('/'),
            ],
        ],
        'cache' => [
            'hits' => 0, // Implement cache hit tracking
            'misses' => 0, // Implement cache miss tracking
            'ratio' => 0, // Calculate cache hit ratio
        ],
    ]);
});

// Laravel's built-in health check
Route::get('/up', function () {
    return response()->json([
        'status' => 'ok',
        'timestamp' => now()->toISOString(),
    ]);
});

// Security headers test
Route::get('/security-test', function () {
    return response()->json([
        'message' => 'Security headers test',
        'headers' => [
            'X-Content-Type-Options' => request()->header('X-Content-Type-Options'),
            'X-Frame-Options' => request()->header('X-Frame-Options'),
            'X-XSS-Protection' => request()->header('X-XSS-Protection'),
            'Referrer-Policy' => request()->header('Referrer-Policy'),
            'Content-Security-Policy' => request()->header('Content-Security-Policy'),
            'Strict-Transport-Security' => request()->header('Strict-Transport-Security'),
        ],
    ]);
});
