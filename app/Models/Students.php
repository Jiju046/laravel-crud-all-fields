<?php

namespace App\Models;

use App\Models\City;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Students extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'city_id',
        'email',
        'skills',
        'gender',
        'appointment',
        'address'
    ];

    public function city(){
        return $this->belongsTo(City::class);
    }
}
