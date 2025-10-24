@extends('admin.layouts.app')

@section('title', 'Detalhes do Orçamento - Painel Admin')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>Detalhes do Orçamento</h1>
                    <a href="{{ route('admin.quotes.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Voltar
                    </a>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5>Informações do Cliente</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="text-muted">Nome Completo</label>
                                <p class="h6">{{ $quote->name }}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="text-muted">E-mail</label>
                                <p class="h6">
                                    <a href="mailto:{{ $quote->email }}">{{ $quote->email }}</a>
                                </p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="text-muted">Telefone</label>
                                <p class="h6">
                                    <a href="tel:{{ $quote->phone }}">{{ $quote->phone }}</a>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <label class="text-muted">Tipo de Obra</label>
                                <p class="h6">{{ $quote->type_of_work }}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <label class="text-muted">Data de Envio</label>
                                <p class="h6">{{ $quote->created_at->format('d/m/Y H:i:s') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-header">
                        <h5>Mensagem</h5>
                    </div>
                    <div class="card-body">
                        <p>{{ $quote->message }}</p>
                    </div>
                </div>

                @if($quote->attachment)
                    <div class="card mt-4">
                        <div class="card-header">
                            <h5>Anexo</h5>
                        </div>
                        <div class="card-body">
                            <a href="{{ asset('storage/' . $quote->attachment) }}" class="btn btn-primary" target="_blank">
                                <i class="fas fa-download"></i> Baixar Arquivo
                            </a>
                        </div>
                    </div>
                @endif

                <div class="mt-4 d-flex gap-2">
                    <a href="{{ route('quotes.pdf', $quote) }}" class="btn btn-info" target="_blank">
                        <i class="fas fa-file-pdf"></i> Exportar PDF
                    </a>
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $quote->phone) }}?text=Or%C3%A7amento%20%23{{ $quote->id }}" class="btn btn-success" target="_blank">
                        <i class="fab fa-whatsapp"></i> Enviar WhatsApp
                    </a>
                    <form action="{{ route('admin.quotes.destroy', $quote) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar este orçamento?')">
                            <i class="fas fa-trash"></i> Deletar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
