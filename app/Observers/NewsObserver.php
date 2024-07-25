<?php

namespace App\Observers;

use App\Models\News;
use Illuminate\Support\Str;

class NewsObserver
{
    /**
     * заполнение поля slug
     */
    public function saving(News $news): void
    {
        $news->slug = Str::slug($news->title);
    }
}
