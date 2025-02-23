<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Requests\ZonaRequest;
use App\Http\Resources\ZonaResource;
use App\Models\Zona;
use App\Models\Operador;
use Illuminate\Http\Request;

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
     *     summary="Obtener una zona por ID",
     *     tags={"Zonas"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Zona obtenida con éxito",
     *         @OA\JsonContent(ref="#/components/schemas/Zona")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Zona no encontrada"
 *     ),
 *     @OA\Response(
 *         response=403,
 *         description="No autorizado"
 *     )
 * )
 */
public function show(Zona $zona)
{
    $this->authorize('view', $zona);
    return $this->sendResponse(new ZonaResource($zona), 'Zona obtenida con éxito.');
}


}
