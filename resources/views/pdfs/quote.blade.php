<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Orçamento #{{ $quote->id }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 3px solid #004E89;
            padding-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            color: #004E89;
            font-size: 28px;
        }
        .header p {
            margin: 5px 0;
            color: #666;
        }
        .company-info {
            text-align: center;
            margin-bottom: 30px;
            font-size: 12px;
            color: #666;
        }
        .section {
            margin-bottom: 25px;
        }
        .section-title {
            background-color: #004E89;
            color: white;
            padding: 10px 15px;
            font-weight: bold;
            margin-bottom: 15px;
            font-size: 14px;
        }
        .info-row {
            display: flex;
            margin-bottom: 10px;
            font-size: 13px;
        }
        .info-label {
            font-weight: bold;
            width: 150px;
            color: #004E89;
        }
        .info-value {
            flex: 1;
        }
        .content-box {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 20px;
            font-size: 13px;
            line-height: 1.6;
            border-radius: 5px;
        }
        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            text-align: center;
            font-size: 11px;
            color: #999;
        }
        .badge {
            display: inline-block;
            background-color: #FF6B35;
            color: white;
            padding: 5px 10px;
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
            <h1>ORÇAMENTO</h1>
            <p>Solicitação #{{ str_pad($quote->id, 5, '0', STR_PAD_LEFT) }}</p>
        </div>

        <!-- Company Info -->
        <div class="company-info">
            <strong>Mafem Construções</strong><br>
            Telefone: (11) 9999-9999<br>
            Email: contato@mafem.com.br<br>
            São Paulo, SP
        </div>

        <!-- Client Info -->
        <div class="section">
            <div class="section-title">INFORMAÇÕES DO CLIENTE</div>
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
            <div class="section-title">DESCRIÇÃO DO PROJETO</div>
            <div class="content-box">
                {{ $quote->message }}
            </div>
        </div>

        <!-- Additional Info -->
        <div class="section">
            <div class="section-title">INFORMAÇÕES ADICIONAIS</div>
            <div class="info-row">
                <div class="info-label">Data de Solicitação:</div>
                <div class="info-value">{{ $quote->created_at->format('d/m/Y H:i') }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Anexo:</div>
                <div class="info-value">{{ $quote->attachment ? 'Sim' : 'Não' }}</div>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>Este orçamento foi gerado automaticamente pelo sistema Mafem Construções.</p>
            <p>Para mais informações, entre em contato conosco.</p>
            <p>Documento gerado em {{ now()->format('d/m/Y H:i:s') }}</p>
        </div>
    </div>
</body>
</html>

