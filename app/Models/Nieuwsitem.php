<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;  // Voeg deze regel toe

class Nieuwsitem extends Model
{
    use HasFactory;

    protected $fillable = [
        'titel',
        'afbeelding',
        'content',
        'publicatiedatum',
        'user_id',
    ];

    protected $casts = [
        'publicatiedatum' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
