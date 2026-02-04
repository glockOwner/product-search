<?php

namespace App\Http\Controllers;

use App\Http\Filters\ProductFilter;
use App\Http\Requests\ProductFilterRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use function MongoDB\BSON\toJSON;

class ProductController extends Controller
{
    public function index (ProductFilterRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(ProductFilter::class, ['queryParams' => $data]);

        if (isset($data['per_page'])) {
            $products = Product::filter($filter)->paginate($data['per_page']);
        } else {
            $products = Product::filter($filter)->get();
        }

        return response()->json($products);
    }
}
