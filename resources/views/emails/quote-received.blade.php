<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Orçamento Recebido</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .header {
            background: linear-gradient(135deg, #004E89 0%, #0066cc 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 30px;
        }
        .section {
            margin-bottom: 25px;
        }
        .section-title {
            font-weight: bold;
            color: #004E89;
            font-size: 16px;
            margin-bottom: 10px;
            border-bottom: 2px solid #FF6B35;
            padding-bottom: 8px;
        }
        .info-row {
            display: flex;
            margin-bottom: 8px;
            font-size: 14px;
        }
        .info-label {
            font-weight: bold;
            width: 120px;
            color: #333;
        }
        .info-value {
            flex: 1;
            color: #666;
        }
        .message-box {
            background-color: #f9f9f9;
            border-left: 4px solid #FF6B35;
            padding: 15px;
            margin: 15px 0;
            border-radius: 4px;
        }
        .cta-button {
            display: inline-block;
            background-color: #FF6B35;
            color: white;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin-top: 15px;
        }
        .footer {
            background-color: #f5f5f5;
            padding: 20px;
            text-align: center;
            font-size: 12px;
            color: #999;
            border-top: 1px solid #ddd;
        }
        .badge {
            display: inline-block;
            background-color: #FF6B35;
            color: white;
            padding: 4px 8px;
            border-radius: 3px;
            font-size: 12px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>✓ Novo Orçamento Recebido</h1>
            <p style="margin: 10px 0 0 0; font-size: 14px;">Solicitação #{{ str_pad($quote->id, 5, '0', STR_PAD_LEFT) }}</p>
        </div>

        <!-- Content -->
        <div class="content">
            <p style="font-size: 14px; color: #666;">Olá,</p>
            <p style="font-size: 14px; color: #666;">Você recebeu uma nova solicitação de orçamento através do site Mafem Construções. Confira os detalhes abaixo:</p>

            <!-- Client Info -->
            <div class="section">
                <div class="section-title">Informações do Cliente</div>
                <div class="info-row">
                    <div class="info-label">Nome:</div>
                    <div class="info-value">{{ $quote->name }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Email:</div>
                    <div class="info-value">{{ $quote->email }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Telefone:</div>
                    <div class="info-value">{{ $quote->phone }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Tipo de Obra:</div>
                    <div class="info-value"><span class="badge">{{ $quote->type_of_work }}</span></div>
                </div>
            </div>

            <!-- Project Details -->
            <div class="section">
                <div class="section-title">Descrição do Projeto</div>
                <div class="message-box">
                    {{ $quote->message }}
                </div>
            </div>

            <!-- Additional Info -->
            <div class="section">
                <div class="info-row">
                    <div class="info-label">Anexo:</div>
                    <div class="info-value">{{ $quote->attachment ? '✓ Sim' : 'Não' }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Data:</div>
                    <div class="info-value">{{ $quote->created_at->format('d/m/Y H:i') }}</div>
                </div>
            </div>

            <!-- CTA -->
            <div style="text-align: center; margin-top: 30px;">
                <a href="{{ route('admin.quotes.show', $quote) }}" class="cta-button">
                    Ver Detalhes do Orçamento
                </a>
            </div>

            <p style="font-size: 12px; color: #999; margin-top: 30px; text-align: center;">
                Este é um email automático. Não responda diretamente a este email.
            </p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p style="margin: 0;">Mafem Construções</p>
            <p style="margin: 5px 0 0 0;">Telefone: (11) 9999-9999 | Email: contato@mafem.com.br</p>
        </div>
    </div>
</body>
</html>

