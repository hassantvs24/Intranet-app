<?php

namespace App\Http\Middleware;

use Closure;
use GeoIp2\Database\Reader;

class GeoIP
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $ip     = $request->ip();

        $reader = new Reader(database_path('/geoip/city.mmdb'));

        // dd( $_SERVER['REMOTE_ADDR'] );

        try {
            $record = $reader->city($ip);

            dd( $record );

        } catch (\Exception $e) {

           return $next($request);
        }

        return $next($request);
    }
}
