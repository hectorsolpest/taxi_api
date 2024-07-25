<?php

namespace App\Http\Controllers;

use App\Http\Requests\BaseRequest;
use App\Http\Resources\BaseResource;
use App\Models\Base;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BaseController extends Controller
{
    protected BaseResource $baseResource;

    public function __construct(BaseResource $baseResource)
    {
        $this->baseResource = $baseResource;
    }
    public function index(): JsonResponse|AnonymousResourceCollection
    {
        $bases = Base::all();

        if ($bases->isEmpty()) {
            return response()->json(['message' => 'No se encontraron bases', 'status' => 404], 404);
        }

        return $this->baseResource::collection($bases)->additional([
            'message' => 'Bases existentes',
        ]);
    }

    public function store(BaseRequest $request): JsonResponse
    {
        $data = $request->validated();
        $base = new Base($data);
        $base->save();
        return response()->json(['message' => 'Base creada'], 201);
    }

    public function update(BaseRequest $request, Base $base): JsonResponse
    {
        $validatedData = $request->validated();

        $base->fill($validatedData)->save();

        return response()->json(['message' => 'Base actualizada'], 201);
    }

    public function destroy(Base $base): JsonResponse
    {
        $base->delete();

        return response()->json(['message' => 'Base eliminada'], 204);
    }
}
