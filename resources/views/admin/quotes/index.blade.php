@extends('admin.layouts.app')

@section('title', 'Orçamentos - Painel Admin')

@section('content')
    <div class="container-fluid">
        <h1 class="mb-4">Orçamentos Recebidos</h1>

        <div class="card">
            <div class="card-body">
                @if($quotes->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>Telefone</th>
                                    <th>Tipo de Obra</th>
                                    <th>Data</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($quotes as $quote)
                                    <tr>
                                        <td><strong>{{ $quote->name }}</strong></td>
                                        <td>{{ $quote->email }}</td>
                                        <td>{{ $quote->phone }}</td>
                                        <td>{{ $quote->type_of_work }}</td>
                                        <td>{{ $quote->created_at->format('d/m/Y H:i') }}</td>
                                        <td>
                                            <a href="{{ route('admin.quotes.show', $quote) }}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-eye"></i> Ver
                                            </a>
                                            <form action="{{ route('admin.quotes.destroy', $quote) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja deletar este orçamento?')">
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
                        {{ $quotes->links() }}
                    </div>
                @else
                    <p class="text-muted text-center py-4">Nenhum orçamento recebido ainda.</p>
                @endif
            </div>
        </div>
    </div>
@endsection

