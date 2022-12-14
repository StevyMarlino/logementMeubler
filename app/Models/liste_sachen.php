<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class liste_sachen extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function logement()
    {
        return $this->belongsTo(logement::class,'logement_id');
    }
}
