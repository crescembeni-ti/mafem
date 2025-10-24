@extends('admin.layouts.app')

@section('title', 'Posts - Painel Admin')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Posts do Blog</h1>
            <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Novo Post
            </a>
        </div>

        <div class="card">
            <div class="card-body">
                @if($posts->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Título</th>
                                    <th>Autor</th>
                                    <th>Status</th>
                                    <th>Data</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td><strong>{{ $post->title }}</strong></td>
                                        <td>{{ $post->user->name }}</td>
                                        <td>
                                            @if($post->published)
                                                <span class="badge bg-success">Publicado</span>
                                            @else
                                                <span class="badge bg-warning">Rascunho</span>
                                            @endif
                                        </td>
                                        <td>{{ $post->published_at?->format('d/m/Y') ?? 'N/A' }}</td>
                                        <td>
                                            <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i> Editar
                                            </a>
                                            <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?')">
                                                    <i class="fas fa-trash"></i> Deletar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-4">
                        {{ $posts->links() }}
                    </div>
                @else
                    <p class="text-muted text-center py-4">Nenhum post criado. <a href="{{ route('admin.posts.create') }}">Criar um novo</a></p>
                @endif
            </div>
        </div>
    </div>
@endsection

