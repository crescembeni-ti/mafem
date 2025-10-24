@extends('layouts.app')

@section('title', 'Mafem Construções - Início')

@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Bem-vindo à Mafem Construções</h1>
            <p>Realizando seus sonhos em construção e reforma</p>
            <a href="{{ route('quotes.create') }}" class="btn btn-primary btn-lg">
                <i class="fas fa-file-invoice-dollar"></i> Solicitar Orçamento
            </a>
        </div>
    </section>

    <!-- Serviços -->
    <section class="light-bg">
        <div class="container">
            <h2>Nossos Serviços</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="fas fa-hammer" style="font-size: 3rem; color: #FF6B35; margin-bottom: 1rem;"></i>
                            <h5 class="card-title">Construção</h5>
                            <p class="card-text">Projetos de construção residencial e comercial com qualidade garantida.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="fas fa-paint-roller" style="font-size: 3rem; color: #FF6B35; margin-bottom: 1rem;"></i>
                            <h5 class="card-title">Reforma</h5>
                            <p class="card-text">Reformas completas ou parciais para renovar seus ambientes.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="fas fa-expand" style="font-size: 3rem; color: #FF6B35; margin-bottom: 1rem;"></i>
                            <h5 class="card-title">Ampliação</h5>
                            <p class="card-text">Amplie seu espaço com projetos bem planejados e executados.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Projetos Recentes -->
    <section>
        <div class="container">
            <h2>Projetos Recentes</h2>
            <div class="row g-4">
                @php
                    $projects = \App\Models\Project::latest()->take(3)->get();
                @endphp
                @forelse($projects as $project)
                    <div class="col-md-4">
                        <div class="card">
                            @if($project->image)
                                <img src="{{ asset('storage/' . $project->image) }}" class="card-img-top" alt="{{ $project->title }}">
                            @else
                                <div class="card-img-top bg-light d-flex align-items-center justify-content-center">
                                    <i class="fas fa-image" style="font-size: 3rem; color: #ccc;"></i>
                                </div>
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $project->title }}</h5>
                                <p class="card-text">{{ Str::limit($project->description, 100) }}</p>
                                <small class="text-muted">{{ $project->created_at->format('d/m/Y') }}</small>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-center text-muted">Nenhum projeto disponível no momento.</p>
                    </div>
                @endforelse
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('projects.index') }}" class="btn btn-primary">
                    Ver Todos os Projetos <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="light-bg">
        <div class="container text-center">
            <h2>Pronto para começar seu projeto?</h2>
            <p style="font-size: 1.1rem; margin-bottom: 2rem;">Entre em contato conosco e solicite um orçamento sem compromisso.</p>
            <a href="{{ route('quotes.create') }}" class="btn btn-primary btn-lg">
                <i class="fas fa-envelope"></i> Solicitar Orçamento
            </a>
        </div>
    </section>
@endsection

@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold mb-4">Bem-vindo à Home</h1>
        <p>Este é o conteúdo da página inicial.</p>
    </div>
@endsection