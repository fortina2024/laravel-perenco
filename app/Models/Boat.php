<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Boat extends Model
{
    protected $table = 'boat';
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function nouveauvoyage()
    {
        return $this->belongsTo(Nouveauvoyage::class);
    }
    public function voyages()
    {
        return $this->hasMany(Voyage::class);
    }
}
