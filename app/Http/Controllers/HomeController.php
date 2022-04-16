<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Array_;

class HomeController extends Controller
{
    public $data = [];
    public function index(){
        $this ->data['title'] = 'Shop đồ chơi E';
        $this ->data['category'] = Category::all();
        $this ->data['products'] = Product::orderBy('sold', 'desc')->limit(6)->get();
        return view('clients.home',$this->data);
    }
    
  
}
