<?php
namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;
class FrontController extends Controller
{
    public function index()
    {
        $pr = Product::all();
        return view('front.home', compact('pr'));
    }
}