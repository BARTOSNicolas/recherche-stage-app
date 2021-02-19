<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Suivi;
use App\Models\Entreprise;


class HomeController extends Controller
{
    //Homepage avec Toutes les candidatures du User
    public function index(){
        $entreprises = Suivi::where('user_id', Auth::user()->id)->get();
        if ($entreprises->isEmpty()){
            return view('home', ['entreprises' => $entreprises, 'vide' => 'Vous n\'avez pas encore créé de fiche candidature.', 'btn' => true]);
        }else{
            return view('home', ['entreprises' => $entreprises]);
        }
    }
    //Homepage avec les candidatures à relancer du User
    public function relaunch(){
        $entreprises = Suivi::where([
            ['user_id', Auth::user()->id],
            ['relaunch', '=', null],
            ['first_date', '!=', null],
            ['status', '=', 'encours'],
            ['response', '=', 'off'],
        ])->orderBy('relaunch')->get();
        if ($entreprises->isEmpty()){
            return view('home', ['entreprises' => $entreprises, 'vide' => 'Aucune entreprise à relancer !']);
        }else{
            return view('home', ['entreprises' => $entreprises]);
        }
    }
    //Homepage avec les candidatures avec entretien du User
    public function interview(){
        $entreprises = Suivi::where('user_id', Auth::user()->id)->where([
            ['interview_date', '!=', null],
            ['interview_date', '>', date("Y-m-d")]
        ])->orderBy('interview_date')->get();
        if ($entreprises->isEmpty()){
            return view('home', ['entreprises' => $entreprises, 'vide' => 'Aucun entretien à venir !']);
        }else{
            return view('home', ['entreprises' => $entreprises]);
        }
    }
    //Homepage avec les candidatures à candidater du User
    public function candidate(){
        $entreprises = Suivi::where([
            ['user_id', Auth::user()->id],
            ['status', "!=", "negatif"]
            ])->whereNull('first_date')->get();
        if ($entreprises->isEmpty()){
            return view('home', ['entreprises' => $entreprises, 'vide' => 'Vous n\'avez plus d\'entreprises à candidater!']);
        }else{
            return view('home', ['entreprises' => $entreprises]);
        }
    }
    //Homepage avec les candidatures positive du User
    public function positive(){
        $entreprises = Suivi::where([
            ['user_id', Auth::user()->id],
            ['status', '=', 'positif'],
        ])->get();
        if ($entreprises->isEmpty()){
            return view('home', ['entreprises' => $entreprises, 'vide' => 'Pas encore de réponses positive !']);
        }else{
            return view('home', ['entreprises' => $entreprises]);
        }
    }
    //Homepage avec les candidatures negative du User
    public function negative(){
        $entreprises = Suivi::where([
            ['user_id', Auth::user()->id],
            ['status', '=', 'negatif'],
        ])->get();
        if ($entreprises->isEmpty()){
            return view('home', ['entreprises' => $entreprises, 'vide' => 'Pas encore de réponses négative !']);
        }else{
            return view('home', ['entreprises' => $entreprises]);
        }
    }
    //Homepage avec les candidatures en cours du User
    public function encours(){
        $entreprises = Suivi::where([
            ['user_id', Auth::user()->id],
            ['status', '=', 'encours'],
        ])->get();
        if ($entreprises->isEmpty()){
            return view('home', ['entreprises' => $entreprises, 'vide' => 'Vous n\'avez pas encore envoyer de candidature !']);
        }else{
            return view('home', ['entreprises' => $entreprises]);
        }
    }
    //Page pour ajouter une candidature
    public function goToInsert(){
        return view('formulaire');
    }
    //Création de la nouvelle candidature
    public function insert(Request $request){
        $validated = $request->validate([
            'ent_name' => 'required',
            'ent_city' => 'required',
            'status' => 'required',
            'ent_mail' => 'max:100',
            'ent_phone' => 'max:100',
            'ent_web' => 'max:100',
            'ent_description' => 'max:255'
        ]);

        $entreprise = new Entreprise;

        $entreprise->ent_name = $request->input('ent_name');
        $entreprise->ent_city = $request->input('ent_city');
        $entreprise->ent_contact_name = $request->input('ent_contact_name');
        $entreprise->ent_mail = $request->input('ent_mail');
        $entreprise->ent_phone = $request->input('ent_phone');
        $entreprise->ent_web = $request->input('ent_web');
        $entreprise->ent_description = $request->input('ent_description');

        $entreprise->save();

        $suivi = new Suivi;

        $suivi->user_id = Auth::user()->id; //Amodifier avec la gestion des users
        $suivi->entreprise_id = $entreprise->id;
        $suivi->first_date = $request->input('first_date');
        $suivi->relaunch = $request->input('relaunch');
        $suivi->interview_date = $request->input('interview_date');
        $suivi->relaunched = $request->relaunched ? 'on' : 'off';
        $suivi->response = $request->response ? 'on' : 'off';
        $suivi->status = $request->input('status');

        $suivi->save();

        return redirect()->route('homepage')->with('status', 'Création reussie');
    }
    //Page pour modifier une candidature
    public function goToUpdate(Suivi $suivi){
        return view('update', ['suivi' => $suivi]);
    }
    //Modification de la candidature
    public function updated(Suivi $suivi, Request $request){
        $validated = $request->validate([
            'ent_name' => 'required',
            'ent_city' => 'required',
            'status' => 'required',
            'ent_mail' => 'max:100',
            'ent_phone' => 'max:100',
            'ent_web' => 'max:100',
            'ent_description' => 'max:255'
        ]);
        $suivi->entreprise->update($request->all());
        $suivi->update($request->all());
        $suivi->relaunched = $request->relaunched ? 'on' : 'off';
        $suivi->response = $request->response ? 'on' : 'off';

        $suivi->save();

        return redirect()->route('homepage')->with('status', 'Mise à jour réussie');
    }
    //Suppression d'une candidature
    public function delete(Suivi $suivi){
        $suivi->delete();
        return redirect()->route('homepage')->with('status', 'Suppression réussie');
    }
    //Page Mentions légales
    public function info(){
        return view('info');
    }
    //Page protection des données
    public function data(){
        return view('data');
    }
    //Page apporter une amélioration
    public function idea(){
        return view('idea');
    }
    //Page apporter une amélioration
    public function explicate(){
        return view('explication');
    }
    //Stats dans le menu
    static function stats(){
        $stats = [];
        $stats['all'] = Suivi::where('user_id', Auth::user()->id)->count();
        $stats['relaunch'] = Suivi::where([
            ['user_id', Auth::user()->id],
            ['relaunch', '=', null],
            ['first_date', '!=', null],
            ['status', '=', 'encours'],
            ['response', '=', 'off'],
        ])->orderBy('relaunch')->count();
        $stats['interview'] = Suivi::where('user_id', Auth::user()->id)->where([
            ['interview_date', '!=', null],
            ['interview_date', '>', date("Y-m-d")]
        ])->orderBy('interview_date')->count();
        $stats['positive'] = Suivi::where([
            ['user_id', Auth::user()->id],
            ['status', '=', 'positif'],
        ])->count();
        $stats['negative'] = Suivi::where([
            ['user_id', Auth::user()->id],
            ['status', '=', 'negatif'],
        ])->count();
        $stats['encours'] = Suivi::where([
            ['user_id', Auth::user()->id],
            ['status', '=', 'encours'],
        ])->count();
        $stats['candidate']  = Suivi::where('user_id', Auth::user()->id)->whereNull('first_date')->count();

        return $stats;
    }
}
