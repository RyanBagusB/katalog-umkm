<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function markAllRead()
    {
        auth()->user()
            ->notifications()
            ->update(['is_read' => true]);

        return back()->with('success', 'Semua notifikasi telah ditandai dibaca.');
    }

    public function markRead(Notification $notification)
    {
        // Cek hanya boleh notif milik sendiri
        if ($notification->user_id !== auth()->id()) {
            abort(403);
        }

        $notification->update(['is_read' => true]);

        return back()->with('success', 'Notifikasi telah ditandai dibaca.');
    }

    public function destroy(Notification $notification)
    {
        // Cek hanya boleh notif milik sendiri
        if ($notification->user_id !== auth()->id()) {
            abort(403);
        }

        $notification->delete();

        return back()->with('success', 'Notifikasi telah dihapus.');
    }
}
