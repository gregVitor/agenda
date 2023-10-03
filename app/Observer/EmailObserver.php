<?php
namespace App\Observer;

use App\Models\Email;
use App\Services\NotificationService;

class EmailObserver
{
    public function update(Email $email){

        $service = resolve(NotificationService::class);
        $service->triggerWarning($email);
    }
}