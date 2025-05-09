<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\NotificationService;

class CheckEcheances extends Command
{
    protected $signature = 'notifications:check-echeances';
    protected $description = 'Vérifie les échéances des courriers';

    public function handle(NotificationService $notificationService)
    {
        $notificationService->checkEcheances();
        $this->info('Vérification des échéances terminée');
    }
}
