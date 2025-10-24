@extends('admin.layouts.app')

@section('title', 'Editar Projeto - Painel Admin')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h1 class="mb-4">Editar Projeto</h1>

                <div class="card">
                    <div class="card-body p-4">
                        <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="title" class="form-label">Título *</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $project->title) }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Descrição *</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5" required>{{ old('description', $project->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Imagem (Opcional)</label>
                                <small class="d-block text-muted mb-2">Formatos: JPEG, PNG, JPG, GIF (máx. 2MB)</small>
                                
                                @if($project->image)
                                    <div class="mb-3">
                                        <p class="text-muted">Imagem atual:</p>
                                        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" style="max-width: 200px; border-radius: 5px;">
                                    </div>
                                @endif
                                
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                                <small class="text-muted">Deixe em branco para manter a imagem atual</small>
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Atualizar Projeto
                                </button>
                                <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-times"></i> Cancelar
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

