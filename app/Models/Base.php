<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Base extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['name', 'phone', 'address'];

    public function taxis()
    {
        return $this->hasMany(Taxi::class);
    }
}
