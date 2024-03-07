<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable =[
        'evenement_id',
        'user_id',
        'status',
        'reference'
    ];

    
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function evenement() {
        return $this->belongsTo(Evenement::class, 'evenement_id');
    }
}
