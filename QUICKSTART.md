# 🚀 Quick Start - Mafem Construções

## ⚡ Início Rápido em 5 Passos

### 1️⃣ Instalar Dependências
```bash
composer install
npm install
npm run build
```

### 2️⃣ Configurar Banco de Dados
Edite o arquivo `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mafem_construcoes
DB_USERNAME=root
DB_PASSWORD=sua_senha
```

Crie o banco de dados:
```bash
mysql -u root -p
CREATE DATABASE mafem_construcoes;
EXIT;
```

### 3️⃣ Executar Migrations
```bash
php artisan migrate
php artisan db:seed
```

### 4️⃣ Criar Symlink para Storage
```bash
php artisan storage:link
```

### 5️⃣ Iniciar o Servidor
```bash
php artisan serve
```

Acesse: **http://localhost:8000**

---

## 🔑 Credenciais Padrão

Após executar as seeds, você pode criar um usuário admin:

```bash
php artisan tinker
>>> App\Models\User::create(['name' => 'Admin', 'email' => 'admin@example.com', 'password' => bcrypt('password')])
>>> exit
```

**Email**: admin@example.com
**Senha**: password

---

## 📍 URLs Principais

| URL | Descrição |
|-----|-----------|
| `/` | Página inicial |
| `/projetos` | Listagem de projetos |
| `/orcamento` | Formulário de orçamento |
| `/register` | Registrar novo usuário |
| `/login` | Fazer login |
| `/admin/dashboard` | Dashboard admin |
| `/admin/projetos` | Gerenciar projetos |
| `/admin/orcamentos` | Gerenciar orçamentos |

---

## 🛠️ Comandos Úteis

```bash
# Limpar cache
php artisan cache:clear

# Resetar banco de dados
php artisan migrate:refresh --seed

# Criar novo migration
php artisan make:migration nome_migration

# Criar novo model
php artisan make:model NomeModel

# Criar novo controller
php artisan make:controller NomeController

# Compilar assets
npm run build

# Watch para desenvolvimento
npm run dev
```

---

## 📁 Estrutura Importante

```
mafem-construcoes/
├── app/Http/Controllers/     # Controllers
├── app/Models/               # Models
├── database/migrations/       # Migrations
├── database/seeders/         # Seeders
├── resources/views/          # Views Blade
├── routes/web.php            # Rotas
├── public/storage/           # Uploads (symlink)
└── .env                       # Configurações
```

---

## ❓ Troubleshooting

### Erro ao fazer upload
```bash
php artisan storage:link
```

### Banco de dados não conecta
Verifique as credenciais no `.env` e se o MySQL está rodando.

### Permissão negada
```bash
chmod -R 775 storage bootstrap/cache
```

### Assets não carregam
```bash
npm run build
php artisan cache:clear
```

---

## 📖 Documentação Completa

Para mais detalhes, consulte `DOCUMENTACAO.md`

---

**Pronto para começar? Bom desenvolvimento! 🎉**

