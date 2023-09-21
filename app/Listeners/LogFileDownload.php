<?php

namespace App\Listeners;

use App\Events\FileDownloaded;
use App\Models\Downloaded;
use App\Models\Files;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogFileDownload
{
    /**
     * Create the event listener.
     */
    public function __construct(public Files $file)
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(FileDownloaded $event)
    {
        $file = Files::findOrFail($event->fileId);
        $file->downloads += 1;
        $file->save();
    }
}
