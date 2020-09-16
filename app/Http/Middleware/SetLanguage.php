<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class SetLanguage
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
        $languages = array_keys( config( 'app.languages' ) );
        $route     = $request->route();

        if ( request('language') ) {
            session()->put('language', request('language'));
            $language = request('language');
            if ( array_key_exists('language', $route->parameters ) && $route->parameters['language'] != $language )
            {
                $route->parameters['language'] = $language;

                if ( in_array( $language, $languages ) ) {
                    app()->setLocale($language);
                }

                return redirect(route($route->getName(), $route->parameters));
            }
        }
        elseif( Auth::user() ) {
            session()->put('language', Auth::user()->language );
            app()->setLocale( Auth::user()->language );
        }
        elseif (session('language')) {
            $language = session('language');

            if ( array_key_exists('language', $route->parameters) && $route->parameters['language'] != $language && in_array($route->parameters['language'], $languages))
            {
                $language = $route->parameters['language'];
                session()->put('language', $language);
            }
        } elseif (config('app.locale')) {
            $language = config('app.locale');
        }

        if ( isset($language) && in_array($language, $languages) ) {
            app()->setLocale($language);
        }
        // \App::setLocale( $request->language );
        return $next($request);
    }
}
