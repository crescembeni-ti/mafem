<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{
    // Exportar orçamento em PDF
    public function exportQuote(Quote $quote)
    {
        $pdf = PDF::loadView('pdfs.quote', compact('quote'));
        return $pdf->download('orcamento-' . $quote->id . '.pdf');
    }

    // Visualizar orçamento em PDF
    public function viewQuote(Quote $quote)
    {
        $pdf = PDF::loadView('pdfs.quote', compact('quote'));
        return $pdf->stream('orcamento-' . $quote->id . '.pdf');
    }
}
