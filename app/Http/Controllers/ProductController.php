<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    /**
     * Показать содержимое таблицы по 5 записей
     */
    public function index(): Response
    {
        return response()->json(Product::paginate(5), 200);
    }

    /**
     * Показать одну запись
     */
    public function show(Product $product): Response
    {
        return response()->json($product, 200);
    }

    /**
     * Создать запись
     */
    public function store(Request $request): Response
    {
        $product = Product::create($request->all());
        return response()->json($product, 201);
    }

    /**
     * Обновить запись
     */
    public function update(Request $request, Product $product): Response
    {
        $product->update($request->all());
        return response()->json($product, 200);
    }

    /**
     * Удалить запись
     */
    public function destroy(Product $product): Response
    {
        $product->delete();
        return response()->noContent();
    }
}
