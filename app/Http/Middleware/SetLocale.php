<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session; // Pour stocker la langue en session

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        $supportedLocales = ['en', 'fr', 'ar']; // Langues supportées

        // 1. Langue depuis le paramètre d'URL
        if ($request->has('lang') && in_array($request->query('lang'), $supportedLocales)) {
            $locale = $request->query('lang');
            App::setLocale($locale);
            Session::put('locale', $locale); // Stocke en session pour les requêtes suivantes
        } 
        // 2. Langue depuis la session (si pas de paramètre d'URL)
        elseif (Session::has('locale') && in_array(Session::get('locale'), $supportedLocales)) {
            App::setLocale(Session::get('locale'));
        }
        // 3. Langue du navigateur (optionnel, moins prioritaire)
        // elseif ($request->server('HTTP_ACCEPT_LANGUAGE')) {
        //     $browserLocale = substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);
        //     if (in_array($browserLocale, $supportedLocales)) {
        //         App::setLocale($browserLocale);
        //     }
        // }
        // Sinon, la locale par défaut de config/app.php ('en') sera utilisée.

        return $next($request);
    }
}