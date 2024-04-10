<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'adresse'
    ];

    protected $fillable = [
        
        'prospect_id',
    ];

    public function prospect()
    {
        return $this->belongsTo(Prospect::class);
    }
}
