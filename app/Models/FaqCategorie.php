<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqCategorie extends Model
{
    use HasFactory;

    // Specificeer de juiste tabelnaam
    protected $table = 'faq_categorieen';

    protected $fillable = ['naam'];

    public function vragen()
    {
        return $this->hasMany(FaqVraag::class);
    }
}
