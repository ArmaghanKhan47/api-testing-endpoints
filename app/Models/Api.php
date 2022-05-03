<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Api extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'method',
        'structure'
    ];

    public function creator(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
