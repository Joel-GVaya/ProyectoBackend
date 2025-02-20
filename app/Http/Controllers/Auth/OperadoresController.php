<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\Operador;

use Illuminate\Http\Request;

use App\Http\Controllers\BaseController;

use App\Http\Requests\OperadoresRequest;

class OperadoresController extends BaseController

{


public function index()

{

  $operadores = Operador::all();

  return $this->sendResponse($operadores, 'Operadores obtenidos con éxito', 200);

}



public function store(OperadoresRequest $request)

{

  $operador = Operador::create($request->validated());

  return $this->sendResponse($operador, 'Operador creado con éxito', 201);

}



public function show(Operador $operador)

{

  return $this->sendResponse($operador, 'Operador obtenido con éxito', 200);

}



public function update(Request $request, Operador $operador)

{

  $operador->update($request->validated());

  return $this->sendResponse($operador, 'Operador actualizado con éxito', 200);

}


public function destroy(Operador $operador)

{

  $operador->delete();

  return $this->sendResponse(null, 'Operador eliminado con éxito', 200);

}

}