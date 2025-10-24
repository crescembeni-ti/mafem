<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    // Marcar notificação como lida
    public function markAsRead(Quote $quote)
    {
        // Implementação de notificações
        // Pode ser expandida com tabela de notificações
        return response()->json(['success' => true]);
    }

    // Obter notificações recentes
    public function getRecent()
    {
        $quotes = Quote::latest()->take(5)->get();
        return response()->json($quotes);
    }
}
