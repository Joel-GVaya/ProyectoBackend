<?php

namespace App\Http\Controllers;

use App\Http\Requests\ZonaRequest;
use App\Models\Zona;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ZonaController extends BaseController
{
    use AuthorizesRequests;

    /**
     * Mostrar una lista de zonas.
     */
    public function index()
    {
        $this->authorize('viewAny', Zona::class);
        return $this->sendResponse(Zona::all(), 'Lista de zonas obtenida con éxito.');
    }

    /**
     * Guardar una nueva zona en la base de datos.
     */
    public function store(ZonaRequest $request)
    {
        $this->authorize('create', Zona::class);
        $zona = Zona::create($request->validated());
        return $this->sendResponse($zona, 'Zona creada con éxito.', 201);
    }

    /**
     * Mostrar los detalles de una zona específica.
     */
    public function show(Zona $zona)
    {
        $this->authorize('view', $zona);
        return $this->sendResponse($zona, 'Detalles de la zona obtenidos con éxito.');
    }

    /**
     * Actualizar la información de una zona.
     */
    public function update(ZonaRequest $request, Zona $zona)
    {
        $this->authorize('update', $zona);
        $zona->update($request->validated());
        return $this->sendResponse($zona, 'Zona actualizada con éxito.', 200);
    }

    /**
     * Eliminar una zona.
     */
    public function destroy(Zona $zona)
    {
        $this->authorize('delete', $zona);
        $zona->delete();
        return $this->sendResponse(null, 'Zona eliminada con éxito.', 204);
    }
}
