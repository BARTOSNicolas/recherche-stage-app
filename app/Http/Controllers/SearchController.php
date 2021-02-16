<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SearchController extends Controller
{
    private $departs;
    public function __construct(){
        $file = 'departements.json';
        $data = file_get_contents($file);
        $this->departs = json_decode($data);
    }
    public function index(){
        return view('recherche', ['departs' => $this->departs]);
    }

    public function list(Request $request){
        $motsclefs = str_replace(' ', '%20', $request->motsclefs);
        $dept = $request->dept;

        $client = new Client();
        $response = $client->request('POST', 'https://entreprise.pole-emploi.fr/connexion/oauth2/access_token?realm=/partenaire', [
            'stream' => true,
            'verify' => false,
            'headers' => ['Content-type' => 'application/x-www-form-urlencoded'],
            'form_params' => [
                'grant_type'=>'client_credentials',
                'client_id'=>env('PE_ID'),
                'client_secret'=>env('PE_SECRET'),
                'scope'=>'application_'.env('PE_ID').' api_offresdemploiv2 o2dsoffre'
            ]
        ]);
        $token = json_decode($response->getBody());
        $search = new Client();
        $list = $search->request('GET', 'https://api.emploi-store.fr/partenaire/offresdemploi/v2/offres/search?departement='.$dept.'&motsCles='.$motsclefs.'', [
            'verify' => false,
            'stream' => true,
            'headers' => ['Authorization' => 'Bearer '. $token->access_token],
        ]);
        $datas = json_decode($list->getBody());
        return view('recherche', ['datas' => $datas->resultats, 'departs' => $this->departs]);

    }
}
