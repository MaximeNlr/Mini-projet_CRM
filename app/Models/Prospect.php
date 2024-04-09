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
        return $this->has (Message::class, 'prospect_id');
    }

    public function client()
    {
        return $this->has (Client::class, 'client_id');
    }
}