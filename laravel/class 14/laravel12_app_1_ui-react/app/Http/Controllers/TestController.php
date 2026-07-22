<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TestController extends Controller
{
    public function index()
    {
        return Inertia::render('Test');
        
    }
    public function about()
    {
        return Inertia::render('About');
        
    }
    public function contact()
    {
        return Inertia::render('Contact');
        
    }
    public function send(Request $request)
    {
        dd($request);
        
    }
    public function login()
    {
        return Inertia::render('Login');
        
    }
    public function product()
    {
        $product = Product::all();
        return Inertia::render('Product',compact('product'));
        
    }

}
