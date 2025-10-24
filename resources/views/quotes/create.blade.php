@extends('layouts.app')

@section('title', 'Solicitar Orçamento - Mafem Construções')

@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Solicitar Orçamento</h1>
            <p>Preencha o formulário abaixo e entraremos em contato em breve</p>
        </div>
    </section>

    <!-- Formulário -->
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Erro ao enviar o formulário:</strong>
                            <ul class="mb-0 mt-2">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-body p-5">
                            <form action="{{ route('quotes.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label for="name" class="form-label">Nome Completo *</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">E-mail *</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">Telefone *</label>
                                    <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" placeholder="(11) 99999-9999" required>
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="type_of_work" class="form-label">Tipo de Obra *</label>
                                    <select class="form-select @error('type_of_work') is-invalid @enderror" id="type_of_work" name="type_of_work" required>
                                        <option value="">Selecione uma opção</option>
                                        <option value="Construção" {{ old('type_of_work') == 'Construção' ? 'selected' : '' }}>Construção</option>
                                        <option value="Reforma" {{ old('type_of_work') == 'Reforma' ? 'selected' : '' }}>Reforma</option>
                                        <option value="Ampliação" {{ old('type_of_work') == 'Ampliação' ? 'selected' : '' }}>Ampliação</option>
                                        <option value="Manutenção" {{ old('type_of_work') == 'Manutenção' ? 'selected' : '' }}>Manutenção</option>
                                        <option value="Outro" {{ old('type_of_work') == 'Outro' ? 'selected' : '' }}>Outro</option>
                                    </select>
                                    @error('type_of_work')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="message" class="form-label">Mensagem *</label>
                                    <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="5" placeholder="Descreva seu projeto..." required>{{ old('message') }}</textarea>
                                    @error('message')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="attachment" class="form-label">Anexar Arquivo (Opcional)</label>
                                    <small class="d-block text-muted mb-2">Formatos aceitos: PDF, JPG, PNG, DOC, DOCX (máx. 5MB)</small>
                                    <input type="file" class="form-control @error('attachment') is-invalid @enderror" id="attachment" name="attachment" accept=".pdf,.jpg,.jpeg,.png,.doc,.docx">
                                    @error('attachment')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="fas fa-paper-plane"></i> Enviar Solicitação
                                    </button>
                                </div>

                                <p class="text-muted text-center mt-3">
                                    <small>* Campos obrigatórios</small>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Info Section -->
    <section class="light-bg">
        <div class="container">
            <h2>Por que nos escolher?</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="text-center">
                        <i class="fas fa-check-circle" style="font-size: 2.5rem; color: #FF6B35; margin-bottom: 1rem;"></i>
                        <h5>Qualidade Garantida</h5>
                        <p>Projetos executados com excelência e atenção aos detalhes.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center">
                        <i class="fas fa-clock" style="font-size: 2.5rem; color: #FF6B35; margin-bottom: 1rem;"></i>
                        <h5>Prazos Cumpridos</h5>
                        <p>Entrega dentro do prazo estabelecido em contrato.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center">
                        <i class="fas fa-handshake" style="font-size: 2.5rem; color: #FF6B35; margin-bottom: 1rem;"></i>
                        <h5>Atendimento Personalizado</h5>
                        <p>Equipe dedicada ao seu projeto do início ao fim.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

