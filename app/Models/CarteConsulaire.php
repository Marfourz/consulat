<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarteConsulaire extends Model
{
    use HasFactory;

    public function traitements()
    {
        return $this->hasMany('App\Models\TraitementCarteConsulaire');
    }

    public function status(){
        if(count($this->traitements) == 0)
        return "Nouvelle demande";
    else{
        $status = $this->traitements->last()->status;
        if ($status == "reject")
            return "Rejeté";
        else if($status == "ask_modification")
            return "Demande de modification";
        else if ($status == "accept" )
            return "Accepté";
    }}
}
