<?php

namespace App\Http\Controllers\API\Products;

use App\Models\Product;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::select('sku', 'name', 'category', 'currency', 'price');

        if (request()->has('category')) {
            $products->where('category', request()->input('category'));
        }

        if (request()->has('price')) {
            $products->where('price', request()->input('price'));
        }

        $products = $products->get();

        $msg = null;
        if($products->count() == 0){
            $msg = 'No product found';
        }

        return $this->successResponse(ProductResource::collection($products), $msg);
    }
}
