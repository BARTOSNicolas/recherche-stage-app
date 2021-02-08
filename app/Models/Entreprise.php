<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    use HasFactory;
    public $timestamps = false;

//    protected $guarded = [];
    protected $fillable = ['ent_name','ent_city', 'ent_contact_name', 'ent_mail', 'ent_phone', 'ent_description'];

//    public function suivi(){
//        return $this->belongsTo(Suivi::class, 'entreprise_id', 'id');
//    }
}
