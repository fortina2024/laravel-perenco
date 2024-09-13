<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \App\Models\Boat;

class Nouveauvoyage extends Model
{
    protected $table = 'nouveauvoyage';
    public function bateau()
    {
        return $this->belongsTo(Boat::class);
    }
}
