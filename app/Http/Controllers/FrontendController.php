<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class FrontendController extends Controller
{
    public function index()
    {
        $products = Product::paginate();
        
        return $products;
    }
}
