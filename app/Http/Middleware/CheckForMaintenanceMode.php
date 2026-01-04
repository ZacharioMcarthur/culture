<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode as Middleware;
use Illuminate\Http\Request;

class CheckForMaintenanceMode extends Middleware
{
    /**
     * The URIs that should be reachable while maintenance mode is enabled.
     *
     * @var array<int, string>
     */
    protected $except = [
        'health',
        'metrics',
        'up',
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, $next)
    {
        if ($this->app->isDownForMaintenance()) {
            // Allow health checks during maintenance
            if (in_array($request->path(), $this->except)) {
                return response()->json([
                    'status' => 'maintenance',
                    'message' => 'Application is under maintenance',
                    'timestamp' => now()->toISOString(),
                ], 503);
            }
        }

        return parent::handle($request, $next);
    }
}
