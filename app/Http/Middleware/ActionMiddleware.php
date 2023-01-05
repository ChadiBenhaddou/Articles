<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class ActionMiddleware
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
        
        $listOfAction = ["add","delete","update"];
        if(in_array($request->action, $listOfAction)){
            return $next($request);
       }else{
            return redirect('/err');
       }
    }

    public function terminate($request, $response)
    {
        $value = $request->action; 

        $url = __DIR__.'/time.json';
        $les_donner_de_fichier = json_decode(file_get_contents($url), true);
    
        array_push($les_donner_de_fichier[$value],date("h:i:s"));
        file_put_contents($url, json_encode($les_donner_de_fichier));
    }
}
