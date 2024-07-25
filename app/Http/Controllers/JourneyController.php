<?php

namespace App\Http\Controllers;

use App\Http\Requests\JourneyRequest;
use App\Http\Resources\JourneyResource;
use App\Models\Journey;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class JourneyController extends Controller
{
    protected JourneyResource $journeyResource;

    public function __construct(JourneyResource $journeyResource)
    {
        $this->journeyResource = $journeyResource;
    }
    public function index(Request $request): JsonResponse|AnonymousResourceCollection
    {
        $query = Journey::query();

        if ($request->has('taxi_id'))
        {
            $query->where('taxi_id', $request->input('taxi_id'));
        }

        $journeys = $query->with(['taxi'])->get();

        if ($journeys->isEmpty())
        {
            return response()->json(['message' => 'No se encontraron viajes', 'status' => 404], 404);
        }
        else
        {
            return $this->journeyResource::collection($journeys);

        }
    }

    public function store(JourneyRequest $request): JsonResponse
    {
        $data = $request->validated();
        $base = new Journey($data);
        $base->save();
        return response()->json(['message' => 'Viaje agregado correctamente'], 201);
    }

    public function countJourneys(): JsonResponse
    {
        $totals = Journey::countJourneys();
        return response()->json($totals);
    }

}
