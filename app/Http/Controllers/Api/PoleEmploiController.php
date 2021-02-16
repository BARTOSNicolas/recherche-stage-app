<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PoleEmploiController extends Controller
{
    public function connect(Request $request){
        $token = Http::post('https://entreprise.pole-emploi.fr/connexion/oauth2/access_token');
        dd($token);

        return view('recherche');

    }
}
