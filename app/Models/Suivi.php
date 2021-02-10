<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suivi extends Model
{
    use HasFactory;

    protected $fillable = ['first_date', 'relaunch', 'relaunched', 'responses', 'status', 'interview_date'];

    public function user(){
        return $this->hasOne(
            User::class,
            'id',
            'user_id',
        );
    }
    public function entreprise(){
        return $this->hasOne(
            Entreprise::class,
            'id',
            'entreprise_id',
        );
    }

}
