<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Journey extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['origin', 'destiny', 'taxi_id', 'start_datetime','end_datetime'];

    public static function countJourneys()
    {
        $query = Journey::select('taxi_id', 'origin', 'destiny', DB::raw('COUNT(*) as total_trips'))
            ->groupBy('taxi_id', 'origin', 'destiny');

        $query = Journey::select('taxis.plate_number as taxi', 'journeys.origin', 'journeys.destiny', DB::raw('COUNT(journeys.id) as total_trips'))
            ->join('taxis', 'journeys.taxi_id', '=', 'taxis.id')
            ->groupBy('taxis.plate_number', 'journeys.origin', 'journeys.destiny');

        return $query->get();
    }

    public function taxi()
    {
        return $this->belongsTo(Taxi::class);
    }
}
