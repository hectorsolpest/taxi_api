<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaxiRequest;
use App\Http\Resources\TaxiResource;
use App\Models\Taxi;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TaxiController extends Controller
{
    protected TaxiResource $taxiResource;

    public function __construct(TaxiResource $taxiResource)
    {
        $this->taxiResource = $taxiResource;
    }
    public function index(Request $request): JsonResponse|AnonymousResourceCollection
    {


        $query = Taxi::query();

        if ($request->has('plate_number')) {
            $query->where('plate_number', $request->input('plate_number'));
        }
        if ($request->has('brand_id')) {
            $query->where('brand_id', $request->input('brand_id'));
        }
        if ($request->has('base_id')) {
            $query->where('base_id', $request->input('base_id'));
        }

        $taxis = $query->with(['brand', 'base'])->get();

        if ($taxis->isEmpty()) {
            return response()->json(['message' => 'No se encontraron taxis', 'status' => 404], 404);
        } else {
            return $this->taxiResource::collection($taxis);
        }
    }


    public function store(TaxiRequest $request): JsonResponse
    {
        $data = $request->validated();
        $base = new Taxi($data);
        $base->save();
        return response()->json(['message' => 'Taxi agregado correctamente'], 201);
    }

    public function update(TaxiRequest $request, Taxi $taxi): JsonResponse
    {
        $validatedData = $request->validated();

        $taxi->fill($validatedData)->save();

        return response()->json(['message' => 'Taxi actualizado'], 201);
    }

    public function destroy(Taxi $taxi): JsonResponse
    {
        $taxi->delete();

        return response()->json(['message'=>'Taxi eliminado correctamente'], 204);
    }
}
