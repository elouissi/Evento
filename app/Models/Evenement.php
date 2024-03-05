<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    use HasFactory;
  protected $fillable=[
    'image',
    'lieux',
    'titre',
    'prix',
    'durée',
    'description',
    'status',
    'status',
    'accptance',
    'capacity',
    'tickets_vendus',
    'localisation',
    'date',
    'organisateur',
    'categorie_id',
  ];

    public function user() {
      return $this->belongsTo(User::class, 'organisateur');
  }
  
  public function categorie() {
      return $this->belongsTo(Categorie::class, 'categorie_id');
  }
  

}
