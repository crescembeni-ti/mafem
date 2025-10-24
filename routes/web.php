<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\NotificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Rotas públicas
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/projetos', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/orcamento', [QuoteController::class, 'create'])->name('quotes.create');
Route::post('/orcamento', [QuoteController::class, 'store'])->name('quotes.store');

// Blog público
Route::get('/blog', [PostController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [PostController::class, 'show'])->name('blog.show');

// PDF - Exportar orçamento
Route::get('/orcamentos/{quote}/pdf', [PdfController::class, 'exportQuote'])->name('quotes.pdf');
Route::get('/orcamentos/{quote}/pdf-view', [PdfController::class, 'viewQuote'])->name('quotes.pdf.view');

// Rotas administrativas (requerem autenticação)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // Projetos
    Route::get('/projetos', [AdminController::class, 'projectsIndex'])->name('projects.index');
    Route::get('/projetos/criar', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projetos', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projetos/{project}/editar', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/projetos/{project}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projetos/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
    
    // Orçamentos
    Route::get('/orcamentos', [AdminController::class, 'quotesIndex'])->name('quotes.index');
    Route::get('/orcamentos/{quote}', [AdminController::class, 'quotesShow'])->name('quotes.show');
    Route::delete('/orcamentos/{quote}', [AdminController::class, 'quotesDestroy'])->name('quotes.destroy');
    
    // Posts (Blog)
    Route::get('/posts', [PostController::class, 'adminIndex'])->name('posts.index');
    Route::get('/posts/criar', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}/editar', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    
    // Notificações
    Route::post('/notificacoes/{quote}/marcar-lida', [NotificationController::class, 'markAsRead'])->name('notifications.read');
    Route::get('/notificacoes/recentes', [NotificationController::class, 'getRecent'])->name('notifications.recent');
});

require __DIR__.'/auth.php';

