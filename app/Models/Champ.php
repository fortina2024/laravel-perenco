<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Champ extends Model
{
    protected $table = 'champ';
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
