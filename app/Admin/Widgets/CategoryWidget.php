<?php

namespace App\Admin\Widgets;

use App\Models\Category;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Contracts\Support\Renderable;

class CategoryWidget extends AbstractWidget
{
    protected $config = [];

    /**
     * Виджет Категории
     */
    public function run(): Renderable
    {
        $count = Category::count();
        return view('voyager::dimmer', array_merge($this->config, [
            'icon' => 'voyager-shop',
            'title' => 'Счётчик категорий',
            'text' => "Количество категорий: {$count}. Кнопка ниже покажет все категории.",
            'button' => [
                'text' => 'Перейти к списку',
                'link' => route('voyager.categories.index'),
            ],
            'image' => '/public/storage/8.jpeg',
        ]));
    }

    /**
     * Возможность отображения
     */
    public function shouldBeDisplayed(): bool
    {
        return true;
    }
}
