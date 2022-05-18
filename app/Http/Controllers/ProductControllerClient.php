<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Layout;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductControllerClient extends Controller
{
    public function index(Request $request){
        $products = Product::where('active','>',0)->where("amount",'>',0);
        if(isset($request->min) && isset($request->max)){
            $products = $products->where("price",">",$request->min);
            $products = $products->where("price","<",$request->max);
        }
        if(!empty($request->keyword)){
            $products = $products->where('name','LIKE','%'.$request->keyword.'%')
             ->orWhere('description', 'LIKE','%'.$request->keyword.'%');
        }
        if(!empty($request->sort)){
            if($request->sort=="gia-giam") $products = $products->orderBy("price", 'desc');
            if($request->sort=='gia-tang') $products = $products->orderBy("price", 'asc');
            if($request->sort=='dang-khuyen-mai') $products = $products->where("active_sale", '1');
            if($request->sort=='san-pham-moi') $products = $products->orderBy("created_at", 'desc');
            if($request->sort=="ban-chay-nhat") $products = $products->orderBy("sold", 'desc');
        }
        $this ->data['category'] = Category::all();
        $this ->data['title'] = 'Sản phẩm';
        $this ->data['design'] = Layout::where('id',1)->first();
        $this ->data['products'] = $products->with('category')->paginate(12);
        return view('clients.products',$this->data);
    }
    public function getCategory($id,Request $request){
        
            $products = $this->getChild($id);
            /* dd($products->toSql()); */
            if(!empty($request->keyword)){
                $products = $products->where('name','LIKE','%'.$request->keyword.'%');
            }
            if(isset($request->min) && isset($request->max)){
                $products = $products->where("price",">",$request->min);
                $products = $products->where("price","<",$request->max);
            }
            if(!empty($request->sort)){
                if($request->sort=="gia-giam") $products = $products->orderBy("price", 'desc');
                if($request->sort=='gia-tang') $products = $products->orderBy("price", 'asc');
                if($request->sort=='dang-khuyen-mai') $products = $products->where("active_sale", 1);
                if($request->sort=='san-pham-moi') $products = $products->orderBy("created_at", 'desc');
                if($request->sort=="ban-chay-nhat") $products = $products->orderBy("sold", 'desc');
                /* dd($products->toSql()); */
            }
        $this ->data['category'] = Category::all();
        $this ->data['title'] = 'Sản phẩm';
        $this ->data['design'] = Layout::where('id',1)->first();
        $this ->data['products'] = $products->with('category')->paginate(12);
        return view('clients.products',$this->data);
    }
    public function show($id){
        $item = Product::where('id',$id)->first();
        $category = Category::all();
        return view("clients.detailProduct",[
            'title' => 'Chi tiết' ,
            'category' => $category,
            'item' => $item
        ]);
    }
    public function getChild($id){
        $p = Product::where("amount",'>',0);
        $cateChild = Category::where('parent_id',$id)->get(['id']);
            if(count($cateChild)){
                $arrCate = [];
                foreach ($cateChild as $item){
                    array_push($arrCate, $item['id']);
                }
                $p = $p->whereIn('category_id',$arrCate);
            } 
            else 
            $p = $p->where('category_id',$id);
            return $p;
    }
}
