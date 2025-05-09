<?php

namespace App\Services;

use App\Models\Notification;
use App\Models\Courrier;
use Carbon\Carbon;

class NotificationService
{
    public function createRappel(Courrier $courrier, $delai)
    {
        return Notification::create([
            'courrier_id' => $courrier->id,
            'type' => 'rappel',
            'message' => "Rappel pour le courrier {$courrier->reference}",
            'date_rappel' => Carbon::now()->addDays($delai)
        ]);
    }

    public function checkEcheances()
    {
        $courriers = Courrier::where('statut', 'en_cours')
            ->whereDate('date_reception', '<=', Carbon::now()->subDays(5))
            ->get();

        foreach ($courriers as $courrier) {
            $this->createRappel($courrier, 1);
        }
    }

    public function markAsRead($notificationId)
    {
        $notification = Notification::findOrFail($notificationId);
        $notification->update(['is_read' => true]);
        return $notification;
    }
}
