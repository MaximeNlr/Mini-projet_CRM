<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prospect extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function message()
    {
        return $this->hasMany (Message::class);
    }

    public function client()
    {
        return $this->has (Client::class, 'client_id');
    }

    public function vente()
    {
        return $this->belongsTo (Vente::class, 'vente_id');
    }
}
