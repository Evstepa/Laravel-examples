<?php

namespace App\Events;

use App\Models\News;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewsHidden
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public News $news) {}
}
