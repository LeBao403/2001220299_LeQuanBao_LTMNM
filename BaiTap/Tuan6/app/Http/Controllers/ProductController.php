<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        // Lấy sản phẩm kèm danh mục, phân trang 10 sp/trang
        $products = Product::with('category')->paginate(10);

        // Trả về view 'products.index' và truyền biến $products
        return view('products.index', compact('products'));
    }
}
