<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visa extends Model
{
    protected $fillable = [
        "user_id",
        "family_status",
        "number_of_children",
        "age",
        "usual_residence",
        "profession",
        "militaru_status",
        "passport_number" ,
        "passport_created_at" ,
        "passport_created_by" ,
        "passport_expiry" ,
        "transit_from",
        "stop_duration" ,
        "stay_duration" ,
        "entry_at" ,
        "travel_reason",
        "habit_ivoir_exceeding_three_months" ,
        "habit_ivoir_at" ,
        "information_about_traders_industralists" ,
        "has_relatives_in_ivoir" ,
        "residence_country_adress" ,
        "ivoir_entry_point",
        "ivoir_adress_during_staying",
        "state_destination_after_ivoir" ,
        "not_work_install_and_quit_after_expiration",
        "path_letter_invatation_or_hotel_reservation",
        "path_plane_ticket",
        "path_passport",
        "path_picture"
    ];
    
    use HasFactory;

    public function traitements()
    {
        return $this->hasMany('App\Models\TraitementVisa');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function type(){
        return "Visa";
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
