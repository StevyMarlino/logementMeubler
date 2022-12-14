<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class logement extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function sachen()
    {
        return $this->HasMany(liste_sachen::class,'logement_id');
    }
}
