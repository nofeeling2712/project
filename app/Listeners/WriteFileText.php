<?php

namespace App\Listeners;

use App\Events\DeleteItem;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;
class WriteFileText
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  DeleteItem  $event
     * @return void
     */
    public function handle(DeleteItem $event)
    {
         $fileName = $event->item->id . '.txt';
         // dd($event->item->id);
         $data = 'Sản phẩm bị xóa: ' .$event->item->title .' với ID: '. $event->item->id;
         Storage::put($fileName, $data);
         return true;
    }

    public function failed(DeleteItem $event, $exception) {
        //
    }
}
