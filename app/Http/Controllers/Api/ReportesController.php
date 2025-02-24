<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Http\Requests\ReportesRequest;
use App\Http\Resources\ReportesResource;
use App\Models\LlamadaEntrante;
use App\Models\LlamadaSaliente;
use App\Models\Paciente;
use App\Models\Zona;
use Dompdf\Dompdf;
use Dompdf\Options;

class ReportesController extends BaseController
    {
    /**
     * @OA\Get(
     *     path="/api/reportes/emergencies",
     *     summary="Obtener informes de actuaciones por emergencias",
     *     tags={"Reportes"},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de emergencias obtenida con éxito"
     *     )
     * )
     */
    public function emergencies($zona_id)
{
    $zona = Zona::find($zona_id);

    if (!$zona) {
        return $this->sendError('Zona no encontrada.');
    }

    $emergencias = LlamadaEntrante::where('emergencia', '1')
        ->whereHas('paciente', function ($query) use ($zona) {
            $query->where('zona_id', $zona->id);
        })
        ->get();

    $dompdf = new Dompdf();
    $dompdf->loadHtml(view('reportes.emergencias', compact('emergencias', 'zona'))->render());

    $dompdf->setPaper('A4', 'portrait');

    $dompdf->render();

    return $dompdf->stream('emergencias_' . $zona->nombre . '.pdf');
}
    
    /**
     * @OA\Get(
     *     path="/api/reportes/patients",
     *     summary="Listar pacientes ordenados por apellidos",
     *     tags={"Reportes"},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de pacientes obtenida con éxito"
     *     )
     * )
     */
    public function patients()
    {
        $pacientes = Paciente::orderByRaw("SUBSTRING_INDEX(nombre, ' ', -1) ASC")->get();

        $dompdf = new Dompdf();

        $pdfContent = view('reportes.pacientes', compact('pacientes'))->render();

        $dompdf->loadHtml($pdfContent);

        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();

        return $dompdf->stream('lista_pacientes.pdf');
    }
    /**
     * @OA\Post(
     *     path="/api/reportes/scheduledCalls",
     *     summary="Listar llamadas planificadas para un día específico",
     *     tags={"Reportes"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"fecha"},
     *             @OA\Property(property="fecha", type="string", format="date")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Lista de llamadas planificadas obtenida con éxito"
     *     )
     * )
     */
    public function scheduledCalls(ReportesRequest $request)
    {
        $fecha = $request->validated()['fecha'];
        $zona_id = $request->validated()['zona_id'] ?? null;
    
        $query = LlamadaSaliente::whereDate('fecha_hora', $fecha)->where('planificado', true);

        if ($zona_id) {
            $zona = Zona::find($zona_id);
            if ($zona) {
                $query->whereHas('paciente', function ($query) use ($zona) {
                    $query->where('zona_id', $zona->id);
                });
            } else {
                return $this->sendError('Zona no encontrada.');
            }
        }
    
        $llamadas = $query->get();

        $dompdf = new Dompdf();

        $pdfContent = view('reportes.llamadas_planificadas', compact('llamadas', 'fecha'))->render();
        $dompdf->loadHtml($pdfContent);
    
        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();

        return $dompdf->stream('llamadas_planificadas_' . $fecha . '.pdf');
    }
    
    
    /**
     * @OA\Post(
     *     path="/api/reportes/doneCalls",
     *     summary="Listar llamadas realizadas en un día específico",
     *     tags={"Reportes"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"fecha"},
     *             @OA\Property(property="fecha", type="string", format="date")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Lista de llamadas realizadas obtenida con éxito"
     *     )
     * )
     */
        public function doneCalls(ReportesRequest $request)
        {
            $fecha = $request->validated()['fecha'];
            $llamadas = LlamadaEntrante::whereDate('fecha_hora', $fecha)->get()
                ->merge(LlamadaSaliente::whereDate('fecha_hora', $fecha)->get());
    
            return $this->sendResponse(ReportesResource::collection($llamadas), 'Lista de llamadas realizadas obtenida con éxito.');
        }
    
    /**
     * @OA\Get(
     *     path="/api/reportes/patientHistory/{id}",
     *     summary="Obtener el historial de llamadas de un paciente",
     *     tags={"Reportes"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Historial de llamadas del paciente obtenido con éxito"
     *     )
     * )
     */
        public function patientHistory($id)
        {
            $llamadas = LlamadaEntrante::where('paciente_id', $id)->get()
                ->merge(LlamadaSaliente::where('paciente_id', $id)->get());
    
            return $this->sendResponse(ReportesResource::collection($llamadas), 'Historial de llamadas del paciente obtenido con éxito.');
        }
    



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
