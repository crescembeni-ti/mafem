<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Quote;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Middleware para verificar autenticação
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Dashboard do admin
    public function dashboard()
    {
        $projectsCount = Project::count();
        $quotesCount = Quote::count();
        $recentQuotes = Quote::latest()->take(5)->get();

        return view('admin.dashboard', compact('projectsCount', 'quotesCount', 'recentQuotes'));
    }

    // Listar projetos (admin)
    public function projectsIndex()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    // Listar orçamentos (admin)
    public function quotesIndex()
    {
        $quotes = Quote::latest()->paginate(15);
        return view('admin.quotes.index', compact('quotes'));
    }

    // Visualizar detalhes de um orçamento (admin)
    public function quotesShow(Quote $quote)
    {
        return view('admin.quotes.show', compact('quote'));
    }

    // Deletar orçamento (admin)
    public function quotesDestroy(Quote $quote)
    {
        if ($quote->attachment && \Storage::disk('public')->exists($quote->attachment)) {
            \Storage::disk('public')->delete($quote->attachment);
        }

        $quote->delete();

        return redirect()->route('admin.quotes.index')->with('success', 'Orçamento deletado com sucesso!');
    }
}

