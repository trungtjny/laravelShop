<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Array_;
use App\Models\Design;
class HomeController extends Controller
{
    public $data = [];
    public function index(){
        $this ->data['title'] = 'Trang chủ ';
        $this ->data['category'] = Category::all();
        $this ->data['products'] = Product::orderBy('sold', 'desc')->limit(6)->get();
        $this ->data['design'] = Design::where('id',1)->first();
        return view('clients.home',$this->data);
    }
}
