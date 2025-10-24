@extends('layouts.app')

@section('title', 'Blog - Mafem Construções')

@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Blog & Notícias</h1>
            <p>Acompanhe as novidades e dicas sobre construção e reforma</p>
        </div>
    </section>

    <!-- Posts -->
    <section>
        <div class="container">
            @if($posts->count() > 0)
                <div class="row g-4">
                    @foreach($posts as $post)
                        <div class="col-md-6 col-lg-4">
                            <div class="card h-100">
                                @if($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->title }}" style="height: 250px; object-fit: cover;">
                                @else
                                    <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 250px;">
                                        <i class="fas fa-newspaper" style="font-size: 3rem; color: #ccc;"></i>
                                    </div>
                                @endif
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{ $post->title }}</h5>
                                    <p class="card-text text-muted">{{ Str::limit(strip_tags($post->content), 100) }}</p>
                                    <div class="mt-auto">
                                        <small class="text-muted d-block mb-2">
                                            <i class="fas fa-calendar"></i> {{ $post->published_at->format('d/m/Y') }}
                                        </small>
                                        <a href="{{ route('blog.show', $post->slug) }}" class="btn btn-sm btn-primary">
                                            Ler Mais <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-5">
                    {{ $posts->links() }}
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-inbox" style="font-size: 3rem; color: #ccc; margin-bottom: 1rem;"></i>
                    <p class="text-muted">Nenhum post publicado ainda.</p>
                </div>
            @endif
        </div>
    </section>
@endsection

