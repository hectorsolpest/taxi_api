<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\JsonResponse;

class BrandController extends Controller
{
    public function index(): JsonResponse
    {
        $data = Brand::all();
        if($data->isEmpty())
        {
            $data = ['message'=>'No se encontraron marcas', 'status'=>404];
        }
        return response()->json($data);
    }

    public function store(BrandRequest $request): JsonResponse
    {
        $data = $request->validated();
        $base = new Brand($data);
        $base->save();
        return response()->json(['message' => 'Marca creada'], 201);
    }

    public function update(BrandRequest $request, Brand $brand): JsonResponse
    {
        $brand->name = $request->name;
        $brand->save();
        return response()->json(['message' => 'Marca actualizada'], 201);
    }

    public function destroy(Brand $brand): JsonResponse
    {
        $brand->delete();
        return response()->json(['message'=>'Marca eliminada'], 200);
    }
}
