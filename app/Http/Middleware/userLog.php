<?php

namespace App\Http\Middleware;

use App\Historial_Usuario;
use App\Terminal;
use Closure;
use Illuminate\Support\Facades\Auth;
use Unicodeveloper\Identify\Facades\IdentifyFacade;

class userLog
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
        $response = $next($request);

        // Perform action
        if (Auth::user() != null) {

            $mHistorial_Usuario = new Historial_Usuario;
            $mTerminal = new Terminal;
            $nTerminal = $mTerminal->firstorcreate([
                'os' => IdentifyFacade::os()->getName(),
                'os_version' => IdentifyFacade::os()->getVersion(),
                'browser' => IdentifyFacade::browser()->getName(),
                'browser_version' => IdentifyFacade::browser()->getVersion(),
                'device' => IdentifyFacade::device()->getName(),
                'language' => IdentifyFacade::lang()->getLanguage()
            ]);

                $mHistorial_Usuario->create([
                    'user_id' => Auth::user()->id,
                    'direccion_id' => 1,
                    'terminal_id' => $nTerminal->id,
                    'accion_id' => 3,
                    'current_url' => $request->url(),
                    'method' => $request->method()
                ]);


        }
        return $response;
    }
}
