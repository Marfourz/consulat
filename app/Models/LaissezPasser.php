<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaissezPasser extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        'ivoir_adress',
        'arrival_at',
        'father_name',
        'mother_name',
        'parent_adress',
        'person_to_contact_benin_name',
        'person_to_contact_benin_tel',
        'person_to_contact_ivoir_name',
        'person_to_contact_ivoir_tel',
        "piece_type",
        "piece_number",
        "piece_etablish_by",
        "piece_etablish_at",
        "piece_etablishment_place",
        "piece_expiry_at",
        "passport_extend_from",
        "passport_extend_to",
        "passport_extend_by",
        'path_picture',
        'path_residence_attestation'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function traitements()
    {
        return $this->hasMany('App\Models\TraitementLaissezPasser');
    }

    public function type(){
        return "Laissez passer";
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


    public function alreadyAcceptOrReject(){

        if($this->traitements){
            

            if(count($this->traitements) == 0)
                return false;
            else{
                $status = $this->traitements->last()->status;
                if($status == "reject" || $status == 'accept'){
                    return true;
                }
            }
        }
        return false;
    }

}
