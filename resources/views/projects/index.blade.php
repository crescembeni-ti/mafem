@extends('layouts.app')

@section('title', 'Projetos - Mafem Construções')

@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Nossos Projetos</h1>
            <p>Conheça os projetos que realizamos com excelência</p>
        </div>
    </section>

    <!-- Projetos -->
    <section>
        <div class="container">
            @if($projects->count() > 0)
                <div class="row g-4">
                    @foreach($projects as $project)
                        <div class="col-md-6 col-lg-4">
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
                                    <p class="card-text">{{ $project->description }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">{{ $project->created_at->format('d/m/Y') }}</small>
                                        <a href="{{ route('quotes.create') }}" class="btn btn-sm btn-primary">
                                            Solicitar Orçamento
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-inbox" style="font-size: 3rem; color: #ccc; margin-bottom: 1rem;"></i>
                    <p class="text-muted">Nenhum projeto disponível no momento.</p>
                </div>
            @endif
        </div>
    </section>

    <!-- CTA Section -->
    <section class="light-bg">
        <div class="container text-center">
            <h2>Interessado em um projeto similar?</h2>
            <p style="font-size: 1.1rem; margin-bottom: 2rem;">Solicite um orçamento personalizado para seu projeto.</p>
            <a href="{{ route('quotes.create') }}" class="btn btn-primary btn-lg">
                <i class="fas fa-envelope"></i> Solicitar Orçamento
            </a>
        </div>
    </section>
@endsection

