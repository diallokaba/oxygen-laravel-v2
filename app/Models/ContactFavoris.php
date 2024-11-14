<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactFavoris extends Model
{
    use HasFactory;

    protected $fillable = ['telephone', 'nom_complet'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_contact_favoris', 'contact_favoris_id', 'user_id');
    }

}
