<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['ent_name','ent_city', 'ent_contact_name', 'ent_mail', 'ent_phone', 'ent_web', 'ent_description'];

    public function suivis(){
        return $this->belongsTo(
            Suivi::class,
            'id',
            'entreprise_id',
        );
    }
}
