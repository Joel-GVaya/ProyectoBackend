<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Resources\ZonaResource;
use App\Models\Zona;
use Illuminate\Http\Request;

/**
 * @OA\Tag(name="Zonas", description="API para la gestión de zonas")
 */
class ZonasController extends BaseController
{
    /**
     * @OA\Get(
     *     path="/api/zonas",
     *     summary="Obtener lista de zonas",
     *     tags={"Zonas"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de zonas obtenida con éxito",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Zona"))
     *     ),
     *     @OA\Response(response=403, description="No autorizado")
     * )
     */
    public function index()
    {
        $this->authorize('viewAny', Zona::class);
        $zonas = Zona::all();
        return $this->sendResponse(ZonaResource::collection($zonas), 'Lista de zonas obtenida con éxito.');
    }

    /**
     * @OA\Get(
     *     path="/api/zonas/{id}",
     *     summary="Obtener una zona específica",
     *     tags={"Zonas"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de la zona",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Zona obtenida con éxito",
     *         @OA\JsonContent(ref="#/components/schemas/Zona")
     *     ),
     *     @OA\Response(response=403, description="No autorizado"),
     *     @OA\Response(response=404, description="Zona no encontrada")
     * )
     */
    public function show(Zona $zona)
    {
        $this->authorize('view', $zona);
        return $this->sendResponse(new ZonaResource($zona), 'Zona obtenida con éxito.');
    }
}
