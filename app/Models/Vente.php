<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vente extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function client()
    {
        return $this->belongsTo (Client::class, 'client_id');
    }
    
    public function prospect()
    {
        return $this->belongsTo (Prospect::class, 'prospect_id');
    }

    // public function prospects()
    // {
    //     return $this->has (Prospect::class, 'prospect_id');
    // }

}
