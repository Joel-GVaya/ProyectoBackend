<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
/**
 * @OA\Schema(
 *     description="Solicitud para generar un reporte.",
 *     title="ReportesRequest",
 *     required={"fecha"},
 *     @OA\Property(
 *         property="fecha",
 *         type="string",
 *         format="date",
 *         description="Fecha para la generación del reporte.",
 *         example="2025-02-18"
 *     )
 * )
 */
class ReportesRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'fecha' => 'required|date_format:Y-m-d',
        ];
    }
}
