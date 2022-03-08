<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TraitementLaissezPasser extends Model
{
    use HasFactory;


    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function laissezPasser()
    {
        return $this->belongsTo('App\Models\laissezPasser');
    }

    
}
