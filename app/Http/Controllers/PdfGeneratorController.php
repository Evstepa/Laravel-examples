<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Barryvdh\DomPDF\Facade\Pdf;
use Symfony\Component\HttpFoundation\Response;

class PdfGeneratorController extends Controller
{
    /**
     * Формирование pdf-файла
     */
    public function index(Employee $employee): Response
    {
        $pdf = PDF::loadView("resume", ['employee' => $employee]);
        return $pdf->stream('resume.pdf');
    }
}
