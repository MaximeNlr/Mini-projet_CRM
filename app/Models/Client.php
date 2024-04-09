<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function prospect()
    {
        return $this->belongsTo (Prospect::class, 'prospect_id');
    }

    public function vente()
    {
        return $this->hasMany(Vente::class);
    }
    
}