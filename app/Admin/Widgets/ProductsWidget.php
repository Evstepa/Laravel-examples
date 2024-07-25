<?php

namespace App\Admin\Widgets;

use App\Models\Product;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Contracts\Support\Renderable;

class ProductsWidget extends AbstractWidget
{
    protected $config = [];

    /**
     * Виджет Товары
     */
    public function run(): Renderable
    {
        $count = Product::count();
        return view('voyager::dimmer', array_merge($this->config, [
            'icon' => 'voyager-basket',
            'title' => 'Счётчик товаров',
            'text' => "Количество товаров: {$count}. Кнопка ниже покажет все товары.",
            'button' => [
                'text' => 'Перейти к списку',
                'link' => route('voyager.products.index'),
            ],
            'image' => '/public/storage/4.jpg',
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
