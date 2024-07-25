<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taxi extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['plate_number', 'year', 'brand_id','base_id'];

    public function base()
    {
        return $this->belongsTo(Base::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function journeys()
    {
        return $this->hasMany(Journey::class);
    }
}
