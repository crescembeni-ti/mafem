@extends('admin.layouts.app')

@section('title', 'Dashboard - Painel Admin')

@section('content')
    <div class="main-content">
        <h1 class="page-title">Dashboard</h1>

        <!-- Stats -->
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="stat-card">
                    <i class="fas fa-folder" style="font-size: 2rem; color: #FF6B35; margin-bottom: 10px;"></i>
                    <div class="number">{{ $projectsCount }}</div>
                    <div class="label">Projetos Cadastrados</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="stat-card">
                    <i class="fas fa-file-invoice-dollar" style="font-size: 2rem; color: #FF6B35; margin-bottom: 10px;"></i>
                    <div class="number">{{ $quotesCount }}</div>
                    <div class="label">Orçamentos Recebidos</div>
                </div>
            </div>
        </div>

        <!-- Recent Quotes -->
        <div class="card">
            <div class="card-title">
                <h5>Orçamentos Recentes</h5>
            </div>
            <div class="card-content">
                @if($recentQuotes->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>Tipo de Obra</th>
                                    <th>Data</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentQuotes as $quote)
                                    <tr>
                                        <td>{{ $quote->name }}</td>
                                        <td>{{ $quote->email }}</td>
                                        <td>{{ $quote->type_of_work }}</td>
                                        <td>{{ $quote->created_at->format('d/m/Y H:i') }}</td>
                                        <td>
                                            <a href="{{ route('admin.quotes.show', $quote) }}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-eye"></i> Ver
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        <a href="{{ route('admin.quotes.index') }}" class="btn-primary">
                            Ver Todos os Orçamentos
                        </a>
                    </div>
                @else
                    <p class="text-muted text-center py-4">Nenhum orçamento recebido ainda.</p>
                @endif
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

@section('content')
    <div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold mb-4">Dashboard Admin</h1>
        <p>Aqui ficam as estatísticas e informações do painel administrativo.</p>
    </div>
@endsection