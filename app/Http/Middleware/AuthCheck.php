<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $headers = [
            'Cache-Control'      => 'nocache, no-store, max-age=0, must-revalidate',
            'Pragma'     => 'no-cache',
            'Expires' => 'Sun, 02 Jan 1990 00:00:00 GMT'
        ];

        
        if (!session()-> has('LoggedUser') && ($request->path() != '/' && $request->path() !='/register')) {
            return redirect('/')->with('fail', 'you must be logged in');
           }
    
           if (session()-> has('LoggedUser') && ($request->path() == '/' || $request->path() =='/register')) {
            return back();
           }

           $response = $next($request);

        // return $next($request)
        //         ->header('Cache-Control','no-cache, no-store, max-age=0, must-revalidate')
        //         ->header('Pragma', 'no-cache')->header('Expires','Sat 01 Jan 1990 00:00:00 GMT');

        //         return $response->header('Cache-Control','nocache, no-store, max-age=0, must-revalidate')

        //         ->header('Pragma','no-cache')
        
        //         ->header('Expires','Sun, 02 Jan 1990 00:00:00 GMT');
        return $response;


        
    }
}
