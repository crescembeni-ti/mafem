@extends('admin.layouts.app')

@section('title', 'Projetos - Painel Admin')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Projetos</h1>
            <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Novo Projeto
            </a>
        </div>

        <div class="card">
            <div class="card-body">
                @if($projects->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Título</th>
                                    <th>Descrição</th>
                                    <th>Data de Criação</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($projects as $project)
                                    <tr>
                                        <td>
                                            <strong>{{ $project->title }}</strong>
                                        </td>
                                        <td>{{ Str::limit($project->description, 50) }}</td>
                                        <td>{{ $project->created_at->format('d/m/Y') }}</td>
                                        <td>
                                            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i> Editar
                                            </a>
                                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja deletar este projeto?')">
                                                    <i class="fas fa-trash"></i> Deletar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-muted text-center py-4">Nenhum projeto cadastrado. <a href="{{ route('admin.projects.create') }}">Criar um novo</a></p>
                @endif
            </div>
        </div>
    </div>
@endsection

