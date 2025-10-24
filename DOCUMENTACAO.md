# Documentação Completa - Mafem Construções

## 📖 Índice

1. [Visão Geral](#visão-geral)
2. [Estrutura do Projeto](#estrutura-do-projeto)
3. [Banco de Dados](#banco-de-dados)
4. [Rotas e URLs](#rotas-e-urls)
5. [Controllers](#controllers)
6. [Models](#models)
7. [Views](#views)
8. [Autenticação](#autenticação)
9. [Upload de Arquivos](#upload-de-arquivos)
10. [Guia de Uso](#guia-de-uso)

---

## 🎯 Visão Geral

**Mafem Construções** é um site completo desenvolvido em **Laravel 10** para uma construtora. O projeto possui:

- **Área Pública**: Página inicial, listagem de projetos e formulário de orçamento
- **Painel Administrativo**: Gerenciamento de projetos e orçamentos com autenticação
- **Banco de Dados MySQL**: Armazenamento de projetos e solicitações de orçamento
- **Upload de Arquivos**: Suporte para imagens de projetos e anexos de orçamentos

---

## 📁 Estrutura do Projeto

```
mafem-construcoes/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── ProjectController.php      # CRUD de projetos
│   │   │   ├── QuoteController.php        # Criar orçamentos
│   │   │   └── AdminController.php        # Dashboard e listagens admin
│   │   └── Middleware/
│   ├── Models/
│   │   ├── Project.php                    # Model de Projetos
│   │   ├── Quote.php                      # Model de Orçamentos
│   │   └── User.php                       # Model de Usuários (Breeze)
│   └── Providers/
├── database/
│   ├── migrations/
│   │   ├── create_users_table.php         # Tabela de usuários
│   │   ├── create_projects_table.php      # Tabela de projetos
│   │   └── create_quotes_table.php        # Tabela de orçamentos
│   └── seeders/
│       ├── DatabaseSeeder.php             # Seeder principal
│       └── ProjectSeeder.php              # Dados de exemplo
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php              # Layout principal
│       ├── home.blade.php                 # Página inicial
│       ├── projects/
│       │   └── index.blade.php            # Listagem de projetos
│       ├── quotes/
│       │   └── create.blade.php           # Formulário de orçamento
│       ├── auth/                          # Views de autenticação (Breeze)
│       └── admin/
│           ├── layouts/
│           │   └── app.blade.php          # Layout admin
│           ├── dashboard.blade.php        # Dashboard
│           ├── projects/
│           │   ├── index.blade.php        # Listagem de projetos
│           │   ├── create.blade.php       # Criar projeto
│           │   └── edit.blade.php         # Editar projeto
│           └── quotes/
│               ├── index.blade.php        # Listagem de orçamentos
│               └── show.blade.php         # Detalhes do orçamento
├── routes/
│   ├── web.php                            # Rotas da aplicação
│   └── auth.php                           # Rotas de autenticação (Breeze)
├── public/
│   ├── storage/                           # Symlink para uploads
│   └── build/                             # Assets compilados
├── storage/
│   └── app/
│       └── public/
│           ├── projects/                  # Imagens de projetos
│           └── quotes/                    # Anexos de orçamentos
└── .env                                   # Variáveis de ambiente
```

---

## 🗄️ Banco de Dados

### Tabela: users
```sql
CREATE TABLE users (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    email VARCHAR(255) UNIQUE,
    email_verified_at TIMESTAMP NULL,
    password VARCHAR(255),
    remember_token VARCHAR(100) NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
```

### Tabela: projects
```sql
CREATE TABLE projects (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    description LONGTEXT NOT NULL,
    image VARCHAR(255) NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
```

### Tabela: quotes
```sql
CREATE TABLE quotes (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    type_of_work VARCHAR(255) NOT NULL,
    message LONGTEXT NOT NULL,
    attachment VARCHAR(255) NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
```

---

## 🛣️ Rotas e URLs

### Rotas Públicas

| Método | URL | Controller | Ação |
|--------|-----|-----------|------|
| GET | `/` | HomeController | Página inicial |
| GET | `/projetos` | ProjectController | Listar projetos |
| GET | `/orcamento` | QuoteController | Formulário de orçamento |
| POST | `/orcamento` | QuoteController | Salvar orçamento |
| GET | `/register` | RegisterController | Formulário de registro |
| POST | `/register` | RegisterController | Criar usuário |
| GET | `/login` | LoginController | Formulário de login |
| POST | `/login` | LoginController | Fazer login |

### Rotas Administrativas (Requerem Autenticação)

| Método | URL | Controller | Ação |
|--------|-----|-----------|------|
| GET | `/admin/dashboard` | AdminController | Dashboard |
| GET | `/admin/projetos` | AdminController | Listar projetos |
| GET | `/admin/projetos/criar` | ProjectController | Formulário criar |
| POST | `/admin/projetos` | ProjectController | Salvar projeto |
| GET | `/admin/projetos/{id}/editar` | ProjectController | Formulário editar |
| PUT | `/admin/projetos/{id}` | ProjectController | Atualizar projeto |
| DELETE | `/admin/projetos/{id}` | ProjectController | Deletar projeto |
| GET | `/admin/orcamentos` | AdminController | Listar orçamentos |
| GET | `/admin/orcamentos/{id}` | AdminController | Ver detalhes |
| DELETE | `/admin/orcamentos/{id}` | AdminController | Deletar orçamento |

---

## 🎮 Controllers

### ProjectController
Gerencia operações CRUD de projetos.

**Métodos:**
- `index()` - Listar projetos (público)
- `create()` - Formulário de criação (admin)
- `store()` - Salvar novo projeto (admin)
- `edit()` - Formulário de edição (admin)
- `update()` - Atualizar projeto (admin)
- `destroy()` - Deletar projeto (admin)

### QuoteController
Gerencia solicitações de orçamento.

**Métodos:**
- `create()` - Exibir formulário (público)
- `store()` - Salvar orçamento (público)

### AdminController
Gerencia o painel administrativo.

**Métodos:**
- `dashboard()` - Dashboard com estatísticas
- `projectsIndex()` - Listar projetos
- `quotesIndex()` - Listar orçamentos
- `quotesShow()` - Detalhes do orçamento
- `quotesDestroy()` - Deletar orçamento

---

## 📦 Models

### Project
```php
class Project extends Model {
    protected $fillable = ['title', 'description', 'image'];
}
```

**Atributos:**
- `id` - ID único
- `title` - Título do projeto
- `description` - Descrição detalhada
- `image` - Caminho da imagem
- `created_at` - Data de criação
- `updated_at` - Data de atualização

### Quote
```php
class Quote extends Model {
    protected $fillable = ['name', 'email', 'phone', 'type_of_work', 'message', 'attachment'];
}
```

**Atributos:**
- `id` - ID único
- `name` - Nome do cliente
- `email` - E-mail do cliente
- `phone` - Telefone do cliente
- `type_of_work` - Tipo de obra (Construção, Reforma, etc.)
- `message` - Mensagem/descrição do projeto
- `attachment` - Caminho do arquivo anexado
- `created_at` - Data de envio
- `updated_at` - Data de atualização

---

## 🎨 Views

### Layouts

**layouts/app.blade.php**
- Layout principal do site público
- Navbar com navegação
- Footer com informações de contato
- Estilos Bootstrap 5

**admin/layouts/app.blade.php**
- Layout do painel administrativo
- Sidebar com navegação
- Navbar com informações do usuário
- Estilos customizados

### Páginas Públicas

**home.blade.php**
- Hero section com chamada para ação
- Seção de serviços
- Projetos recentes
- CTA (Call to Action)

**projects/index.blade.php**
- Listagem completa de projetos
- Cards com imagem, título e descrição
- Link para solicitar orçamento

**quotes/create.blade.php**
- Formulário de solicitação de orçamento
- Campos: nome, email, telefone, tipo de obra, mensagem, anexo
- Validação no frontend e backend
- Seção de benefícios

### Páginas Administrativas

**admin/dashboard.blade.php**
- Estatísticas (total de projetos e orçamentos)
- Últimos orçamentos recebidos
- Links para gerenciar projetos e orçamentos

**admin/projects/index.blade.php**
- Tabela com listagem de projetos
- Botões de editar e deletar
- Botão para criar novo projeto

**admin/projects/create.blade.php**
- Formulário para criar novo projeto
- Campos: título, descrição, imagem

**admin/projects/edit.blade.php**
- Formulário para editar projeto
- Exibe imagem atual
- Permite substituir imagem

**admin/quotes/index.blade.php**
- Tabela com listagem de orçamentos
- Paginação (15 por página)
- Botões de visualizar e deletar

**admin/quotes/show.blade.php**
- Detalhes completos do orçamento
- Informações do cliente
- Mensagem e anexo
- Botão para deletar

---

## 🔐 Autenticação

O projeto usa **Laravel Breeze** para autenticação.

### Fluxo de Autenticação

1. **Registro**: Usuário acessa `/register` e cria uma conta
2. **Login**: Usuário acessa `/login` com email e senha
3. **Sessão**: Laravel mantém sessão autenticada
4. **Middleware**: Rotas admin usam middleware `auth`
5. **Logout**: Usuário pode fazer logout via formulário

### Proteção de Rotas

```php
Route::middleware(['auth'])->group(function () {
    // Rotas protegidas aqui
});
```

### Verificar Autenticação nas Views

```blade
@auth
    <!-- Conteúdo para usuários autenticados -->
@else
    <!-- Conteúdo para visitantes -->
@endauth
```

---

## 📤 Upload de Arquivos

### Imagens de Projetos

**Armazenamento**: `storage/app/public/projects/`
**Acesso**: `storage/projects/nome-arquivo.jpg`
**Tamanho Máximo**: 2MB
**Formatos**: JPEG, PNG, JPG, GIF

```php
if ($request->hasFile('image')) {
    $path = $request->file('image')->store('projects', 'public');
    $validated['image'] = $path;
}
```

### Anexos de Orçamentos

**Armazenamento**: `storage/app/public/quotes/`
**Acesso**: `storage/quotes/nome-arquivo.pdf`
**Tamanho Máximo**: 5MB
**Formatos**: PDF, JPG, PNG, DOC, DOCX

```php
if ($request->hasFile('attachment')) {
    $path = $request->file('attachment')->store('quotes', 'public');
    $validated['attachment'] = $path;
}
```

### Symlink

O symlink para `public/storage` é criado automaticamente:
```bash
php artisan storage:link
```

---

## 📚 Guia de Uso

### Para Visitantes

1. **Acessar Home**: Visite `/` para ver a página inicial
2. **Ver Projetos**: Clique em "Projetos" para listar todos os projetos
3. **Solicitar Orçamento**: Clique em "Solicitar Orçamento" e preencha o formulário
4. **Fazer Login**: Clique em "Login" para acessar o painel (se for admin)

### Para Administradores

1. **Fazer Login**: Acesse `/login` com suas credenciais
2. **Dashboard**: Após login, você é redirecionado para `/admin/dashboard`
3. **Gerenciar Projetos**:
   - Clique em "Projetos" no sidebar
   - Clique em "Novo Projeto" para adicionar
   - Clique em "Editar" para modificar
   - Clique em "Deletar" para remover
4. **Gerenciar Orçamentos**:
   - Clique em "Orçamentos" no sidebar
   - Clique em "Ver" para detalhes
   - Clique em "Deletar" para remover
5. **Sair**: Clique em "Sair" para fazer logout

### Criar Novo Projeto

1. Acesse `/admin/projetos/criar`
2. Preencha:
   - **Título**: Nome do projeto
   - **Descrição**: Detalhes do projeto
   - **Imagem**: Foto do projeto (opcional)
3. Clique em "Salvar Projeto"

### Editar Projeto

1. Acesse `/admin/projetos`
2. Clique em "Editar" no projeto desejado
3. Modifique os campos
4. Clique em "Atualizar Projeto"

### Visualizar Orçamento

1. Acesse `/admin/orcamentos`
2. Clique em "Ver" no orçamento desejado
3. Veja todos os detalhes e anexos
4. Opcionalmente, delete o orçamento

---

## 🔧 Configuração

### Arquivo .env

```env
APP_NAME="Mafem Construções"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://seu-dominio.com

DB_CONNECTION=mysql
DB_HOST=seu-host
DB_PORT=3306
DB_DATABASE=mafem_construcoes
DB_USERNAME=usuario
DB_PASSWORD=senha

MAIL_MAILER=smtp
MAIL_HOST=seu-smtp
MAIL_PORT=587
MAIL_USERNAME=seu-email
MAIL_PASSWORD=sua-senha
MAIL_FROM_ADDRESS=contato@mafem.com.br
```

### Variáveis Importantes

- `APP_NAME`: Nome da aplicação
- `APP_URL`: URL do site
- `DB_*`: Credenciais do banco de dados
- `MAIL_*`: Configuração de email (opcional)

---

## 🚀 Deploy

### Preparar para Produção

```bash
# Limpar cache
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Otimizar autoloader
composer install --optimize-autoloader --no-dev

# Compilar assets
npm run build
```

### Hospedagem Recomendada

- PHP 8.1+
- MySQL 5.7+
- Composer
- Node.js (para assets)
- SSL/HTTPS

---

## 📞 Suporte

Para dúvidas ou problemas, entre em contato com a equipe de desenvolvimento.

**Email**: contato@mafem.com.br
**Telefone**: (11) 9999-9999

---

**Versão**: 1.0
**Última Atualização**: Outubro 2025

