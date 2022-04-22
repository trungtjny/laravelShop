<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request){

        $products = Product::where('id','>',0);
        if(!empty($request->category)){
            $this ->data['cateChild'] = Category::where('parent_id',$request->category)->get(['id']);
            if(count($this ->data['cateChild'])){
                $arrCate = [];
                foreach ($this ->data['cateChild'] as $item){
                    array_push($arrCate, $item['id']);
                }
                $products = Product::whereIn('category_id',$arrCate);
            } 
            else 
            $products = Product::where('category_id',$request->category);
        }
        if(!empty($request->keyword)){
            $products = Product::where('name','LIKE','%'.$request->keyword.'%')
             ->orWhere('description', 'LIKE','%'.$request->keyword.'%');
        }
        if(!empty($request->sort)){
            if($request->sort=='gia-giam') $products = Product::orderBy("price", 'desc');
            if($request->sort=='gia-tang') $products = Product::orderBy("price", 'asc');
            if($request->sort=='dang-khuyen-mai') $products = Product::orderBy("active_sale", 'asc');
            if($request->sort=='dang-khuyen-mai') $products = Product::orderBy("active_sale", 'asc');
            if($request->sort=='san-pham-moi') $products = Product::orderBy("created_at", 'desc');

        }
        $this ->data['category'] = Category::all();
   
        $this ->data['title'] = 'Sản phẩm';
        $this ->data['products'] = $products->with('category')->paginate(6);
        /* dd($this->data['products']); */
        return view('clients.products',$this->data);
    }
}
