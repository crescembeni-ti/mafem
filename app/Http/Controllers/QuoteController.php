<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Mail\QuoteReceivedMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class QuoteController extends Controller
{
    // Exibir página de formulário de orçamento (pública)
    public function create()
    {
        return view('quotes.create');
    }

    // Armazenar novo orçamento (pública)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'type_of_work' => 'required|string|max:255',
            'message' => 'required|string',
            'attachment' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:5120',
        ]);

        if ($request->hasFile('attachment')) {
            $path = $request->file('attachment')->store('quotes', 'public');
            $validated['attachment'] = $path;
        }

        $quote = Quote::create($validated);

        // Enviar email ao admin
        try {
            Mail::to(config('mail.from.address'))->send(new QuoteReceivedMail($quote));
        } catch (\Exception $e) {
            // Log do erro, mas não interrompe o fluxo
            \Log::error('Erro ao enviar email de orçamento: ' . $e->getMessage());
        }

        return redirect()->back()->with('success', 'Orçamento solicitado com sucesso! Entraremos em contato em breve.');
    }
}


