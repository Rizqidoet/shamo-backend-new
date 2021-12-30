<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $price_from = $request->input('price_from');
        $price_to = $request->input('price_to');
        $description = $request->input('description');
        $tags = $request->input('tags');
        $categories_id = $request->input('categories_id');
        $limit = $request->input('limit');

        if ($id) {
            $product = Product::with(['product_galleries', 'product_category'])->find($id);

            if ($product) {
                return ResponseFormatter::success($product, 'Data product berhasil dimabil');
            } else {

                return ResponseFormatter::error(null, 'Data product kosong', 404);
            }
        }

        $product = Product::with(['product_galleries', 'product_category']);

        if ($name) {
            $product->where('name', 'like', '%' . $name . '%');
        }
        if ($tags) {
            $product->where('tags', 'like', '%' . $tags . '%');
        }
        if ($description) {
            $product->where('description', 'like', '%' . $description . '%');
        }
        if ($price_from) {
            $product->where('price', '>=', $price_from);
        }
        if ($price_to) {
            $product->where('price', '>=', $price_to);
        }
        if ($categories_id) {
            $product->where('categories_id', $categories_id);
        }
        return ResponseFormatter::success($product->paginate($limit), 'Data product berhasil dimabil');
    }
}
