<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SearchController extends Controller
{
    private $departs;
    private $tokenPE;
    public function __construct(){
        $file = 'departements.json';
        $data = file_get_contents($file);
        $this->departs = json_decode($data);
        $this->tokenPE = $this->getToken();

    }
    public function index(){
        return view('recherche', ['departs' => $this->departs]);
    }
//    public function getCity(){
//        $city = new Client();
//        $res = $city->request('GET', 'https://api.emploi-store.fr/partenaire/offresdemploi/v2/referentiel/communes', [
//            'verify' => false,
//            'stream' => true,
//            'headers' => ['Authorization' => 'Bearer '. $this->tokenPE->access_token],
//        ]);
//        dd($res->getBody()->getContents());
//
//    }
    public function getCityCode($input){
        $file = 'city.json';
        $data = file_get_contents($file);
        $cities = json_decode($data, true);
            foreach ($cities as $city){
                if($city['libelle'] === $input){
                    $codeCity= $city['code'];
                    break;
                }
            }
        return $codeCity;
    }
    private function getToken(){
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
        return json_decode($response->getBody());
    }

    public function list(Request $request){
        $validated = $request->validate([
            'motsCles' => 'required',
            'city' => 'required',
        ]);

        $motsCles = str_replace(' ', '%20', $request->motsCles);
        $distance = $request->distance;
        $city = $this->getCityCode($request->city);
        if($request->has('partenaires')){
            $partenaire = 'INCLUS';
        }else{
            $partenaire = 'EXCLU';
        }
        $search = new Client();
        $list = $search->request('GET', 'https://api.emploi-store.fr/partenaire/offresdemploi/v2/offres/search?commune='.$city.'&distance='.$distance.'&motsCles='.$motsCles.'&modeSelectionPartenaires='.$partenaire.'', [
            'verify' => false,
            'stream' => true,
            'headers' => ['Authorization' => 'Bearer '. $this->tokenPE->access_token],
        ]);
        $datas = json_decode($list->getBody());
        if($datas){
            return view('recherche', ['datas' => $datas->resultats, 'departs' => $this->departs]);
        }else{
            return view('recherche', ['departs' => $this->departs, 'status' => true]);
        }
    }

    public function add_from_pe($ent, $city, $link){
        if($ent == 'null'){
            $nom_ent = '';
        }else{
           $nom_ent = $ent;
        }
        $ville = substr_replace($city,'',  0, 5);
        $lien = 'https://candidat.pole-emploi.fr/offres/recherche/detail/'.$link.'';
        return view('addfrompe', ['nom_ent' => $nom_ent, "ville" => $ville, "lien" => $lien]);
    }
}
