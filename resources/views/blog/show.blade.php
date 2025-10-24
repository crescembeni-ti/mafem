@extends('layouts.app')

@section('title', $post->title . ' - Blog')

@section('content')
    <section style="padding: 40px 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Post Content -->
                    <article>
                        @if($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid rounded mb-4" style="max-height: 400px; object-fit: cover; width: 100%;">
                        @endif

                        <h1 class="mb-3">{{ $post->title }}</h1>
                        
                        <div class="text-muted mb-4">
                            <small>
                                <i class="fas fa-calendar"></i> {{ $post->published_at->format('d/m/Y') }}
                                <span class="mx-2">•</span>
                                <i class="fas fa-user"></i> {{ $post->user->name }}
                            </small>
                        </div>

                        <hr>

                        <div class="post-content" style="line-height: 1.8; font-size: 1.1rem;">
                            {!! nl2br(e($post->content)) !!}
                        </div>

                        <hr class="my-5">

                        <!-- Share Buttons -->
                        <div class="mb-4">
                            <h6 class="mb-3">Compartilhar:</h6>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" class="btn btn-sm btn-outline-primary me-2" target="_blank">
                                <i class="fab fa-facebook"></i> Facebook
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($post->title) }}" class="btn btn-sm btn-outline-info me-2" target="_blank">
                                <i class="fab fa-twitter"></i> Twitter
                            </a>
                            <a href="https://wa.me/?text={{ urlencode($post->title . ' ' . request()->url()) }}" class="btn btn-sm btn-outline-success" target="_blank">
                                <i class="fab fa-whatsapp"></i> WhatsApp
                            </a>
                        </div>
                    </article>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Recent Posts -->
                    <div class="card mb-4">
                        <div class="card-header" style="background-color: #004E89; color: white;">
                            <h6 class="mb-0">Posts Recentes</h6>
                        </div>
                        <div class="card-body">
                            @if($recentPosts->count() > 0)
                                @foreach($recentPosts as $recentPost)
                                    <div class="mb-3 pb-3 border-bottom">
                                        <h6 class="mb-2">
                                            <a href="{{ route('blog.show', $recentPost->slug) }}" style="text-decoration: none; color: #004E89;">
                                                {{ $recentPost->title }}
                                            </a>
                                        </h6>
                                        <small class="text-muted">
                                            <i class="fas fa-calendar"></i> {{ $recentPost->published_at->format('d/m/Y') }}
                                        </small>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-muted mb-0">Nenhum outro post disponível.</p>
                            @endif
                        </div>
                    </div>

                    <!-- CTA -->
                    <div class="card" style="background: linear-gradient(135deg, #FF6B35 0%, #e55a2b 100%); color: white; border: none;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Pronto para seu projeto?</h5>
                            <p class="card-text">Solicite um orçamento sem compromisso.</p>
                            <a href="{{ route('quotes.create') }}" class="btn btn-light btn-sm">
                                Solicitar Orçamento
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Back Link -->
            <div class="mt-5">
                <a href="{{ route('blog.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left"></i> Voltar ao Blog
                </a>
            </div>
        </div>
    </section>
@endsection

