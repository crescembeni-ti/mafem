# Mafem Construções - Guia de Instalação e Configuração

## 📋 Requisitos

- PHP 8.1 ou superior
- Composer
- MySQL 5.7 ou superior
- Node.js 14+ (para assets)

## 🚀 Instalação

### 1. Clonar o Repositório
```bash
git clone <seu-repositorio>
cd mafem-construcoes
```

### 2. Instalar Dependências PHP
```bash
composer install
```

### 3. Configurar Arquivo .env
```bash
cp .env.example .env
php artisan key:generate
```

Edite o arquivo `.env` e configure:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mafem_construcoes
DB_USERNAME=root
DB_PASSWORD=sua_senha
```

### 4. Criar Banco de Dados
```bash
mysql -u root -p
CREATE DATABASE mafem_construcoes;
EXIT;
```

### 5. Executar Migrations
```bash
php artisan migrate
```

### 6. Instalar Dependências Node.js
```bash
npm install
npm run build
```

### 7. Criar Symlink para Storage
```bash
php artisan storage:link
```

### 8. Criar Usuário Admin (Opcional)
```bash
php artisan tinker
>>> App\Models\User::create(['name' => 'Admin', 'email' => 'admin@example.com', 'password' => bcrypt('password')])
>>> exit
```

## 🏃 Executar o Projeto

### Desenvolvimento
```bash
php artisan serve
```

O site estará disponível em `http://localhost:8000`

### Produção
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## 📁 Estrutura do Projeto

```
mafem-construcoes/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── ProjectController.php      # Gerencia projetos
│   │       ├── QuoteController.php        # Gerencia orçamentos
│   │       └── AdminController.php        # Painel administrativo
│   └── Models/
│       ├── Project.php                    # Model de Projetos
│       └── Quote.php                      # Model de Orçamentos
├── database/
│   └── migrations/
│       ├── create_projects_table.php      # Tabela de Projetos
│       └── create_quotes_table.php        # Tabela de Orçamentos
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php              # Layout principal
│       ├── home.blade.php                 # Página inicial
│       ├── projects/
│       │   └── index.blade.php            # Listagem de projetos
│       ├── quotes/
│       │   └── create.blade.php           # Formulário de orçamento
│       └── admin/
│           ├── layouts/
│           │   └── app.blade.php          # Layout admin
│           ├── dashboard.blade.php        # Dashboard
│           ├── projects/
│           │   ├── index.blade.php        # Listagem (admin)
│           │   ├── create.blade.php       # Criar projeto
│           │   └── edit.blade.php         # Editar projeto
│           └── quotes/
│               ├── index.blade.php        # Listagem (admin)
│               └── show.blade.php         # Detalhes do orçamento
├── routes/
│   └── web.php                            # Rotas da aplicação
└── public/
    └── storage/                           # Symlink para uploads
```

## 🔐 Autenticação

O projeto usa **Laravel Breeze** para autenticação. 

### Registrar Novo Usuário
Acesse `/register` para criar uma nova conta.

### Login
Acesse `/login` para fazer login.

### Painel Admin
Após fazer login, acesse `/admin/dashboard` para acessar o painel administrativo.

## 📝 Funcionalidades

### Página Pública
- **Início**: Apresentação da construtora com serviços e projetos recentes
- **Projetos**: Listagem completa de todos os projetos realizados
- **Solicitar Orçamento**: Formulário para clientes solicitarem orçamentos

### Painel Administrativo
- **Dashboard**: Resumo com estatísticas e orçamentos recentes
- **Gerenciar Projetos**: Criar, editar e deletar projetos
- **Gerenciar Orçamentos**: Visualizar, detalhar e deletar orçamentos recebidos

## 📤 Upload de Arquivos

Os arquivos são armazenados em `storage/app/public/`:
- **Imagens de Projetos**: `storage/app/public/projects/`
- **Anexos de Orçamentos**: `storage/app/public/quotes/`

## 🛠️ Comandos Úteis

```bash
# Limpar cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Resetar banco de dados
php artisan migrate:refresh

# Criar novo migration
php artisan make:migration <nome>

# Criar novo model
php artisan make:model <Nome>

# Criar novo controller
php artisan make:controller <NomeController>
```

## 🐛 Troubleshooting

### Erro ao fazer upload de arquivos
Certifique-se de que o symlink foi criado:
```bash
php artisan storage:link
```

### Erro de permissão
```bash
chmod -R 775 storage bootstrap/cache
```

### Banco de dados não conecta
Verifique as credenciais no arquivo `.env` e se o MySQL está rodando.

## 📧 Contato

Para dúvidas ou sugestões, entre em contato com a equipe de desenvolvimento.

## 📄 Licença

Este projeto é propriedade da Mafem Construções.

