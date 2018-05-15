<?php

namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SessionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle( Request $request, Closure $next )
    {      
        if ( Session::has( 'email') ) {

            $url = domain()."/api/bolsa/token";
            $headers = [ 'Content-Type'  => 'application/json' ];
            $data['data'] = [ 'email'=> Session::get('email'),'api_token' => Session::get('api_token') ];
            $method = 'post';
            $client = new Client;
            $response = $client->$method( $url, ['headers'=> $headers, 'body' => json_encode( $data ) ]);
            $response = json_decode( $response->getBody() );
            if ($response->success == true) {
                return $next($request);
            }else{
                Session::flush();
                if ( isset($_SERVER['CONTENT_TYPE']) ) {
                    return response('Token expiro, favor de iniciar sesion.', 401);
                }
                
                return redirect()->route('/');
                
            }


        }else{
            
            Session::flush();
            if ( isset($_SERVER['CONTENT_TYPE']) ) {
                return response('Token expiro, favor de iniciar sesion.', 401);
            }
            
            return redirect()->route('/');

        }

    }

}
