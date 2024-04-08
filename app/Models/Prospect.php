<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prospect extends Model
{
    use HasFactory;

    protected $guarded = ['adresse', 'delai_paiement', 'prospect_id'];

    public function prospect()
    {
        return $this->belongsTo(Prospect::class);
    }
}
