<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\DatabaseMessage;

class DataUpdatedNotification extends Notification
{
    protected $tableLabel, $recordName, $actorName;

    public function __construct(string $tableLabel, string $recordName, string $actorName)
    {
        $this->tableLabel = $tableLabel;
        $this->recordName = $recordName;
        $this->actorName  = $actorName;
    }

    public function via($notifiable) { return ['database']; }

    public function toDatabase($notifiable)
    {
        return [
            'message' => "{$this->actorName} baru saja memperbarui {$this->tableLabel}: \"{$this->recordName}\"",
        ];
    }
}