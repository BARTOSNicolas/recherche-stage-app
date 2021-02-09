<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Suivi;
use App\Models\Entreprise;


class HomeController extends Controller

{
    public function index(){
        $entreprises = Suivi::where('user_id', Auth::user()->id)->get();
        return view('home', ['entreprises' => $entreprises]);
    }

    public function relaunch(){
        $entreprises = Suivi::where([
            ['user_id', Auth::user()->id],
            ['relaunch', '=', null],
            ['first_date', '!=', null],
            ['status', '=', 'encours'],
            ['response', '=', 'off'],
        ])->orderBy('relaunch')->get();
        return view('home', ['entreprises' => $entreprises]);
    }

    public function interview(){
        $entreprises = Suivi::where('user_id', Auth::user()->id)->whereNotNull('interview_date')->orderBy('interview_date')->get();
        return view('home', ['entreprises' => $entreprises]);
    }
    public function candidate(){
        $entreprises = Suivi::where('user_id', Auth::user()->id)->whereNull('first_date')->get();
        return view('home', ['entreprises' => $entreprises]);
    }
    public function positive(){
        $entreprises = Suivi::where([
            ['user_id', Auth::user()->id],
            ['status', '=', 'positif'],
        ])->get();
        return view('home', ['entreprises' => $entreprises]);
    }
    public function negative(){
        $entreprises = Suivi::where([
            ['user_id', Auth::user()->id],
            ['status', '=', 'negatif'],
        ])->get();
        return view('home', ['entreprises' => $entreprises]);
    }
    public function encours(){
        $entreprises = Suivi::where([
            ['user_id', Auth::user()->id],
            ['status', '=', 'encours'],
        ])->get();
        return view('home', ['entreprises' => $entreprises]);
    }

    public function goToInsert(){
        return view('formulaire');
    }

    public function insert(Request $request){
        $validated = $request->validate([
            'ent_name' => 'required',
            'ent_city' => 'required',
            'status' => 'required',
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

    public function goToUpdate(Suivi $suivi){
        return view('update', ['suivi' => $suivi]);
    }

    public function updated(Suivi $suivi, Request $request){
        $validated = $request->validate([
            'ent_name' => 'required',
            'ent_city' => 'required',
            'status' => 'required',
        ]);
        $suivi->entreprise->update($request->all());
        $suivi->update($request->all());
        $suivi->relaunched = $request->relaunched ? 'on' : 'off';
        $suivi->response = $request->response ? 'on' : 'off';

        $suivi->save();

        return redirect()->route('homepage')->with('status', 'Mise à jour réussie');
    }

    public function delete(Suivi $suivi){
        $suivi->delete();
        return redirect()->route('homepage')->with('status', 'Suppression réussie');
    }
}
