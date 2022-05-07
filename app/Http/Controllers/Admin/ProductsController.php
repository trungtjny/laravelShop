<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::where('id','>',0);
        if(!empty($request->category)){
            $this ->data['cateChild'] = Category::where('parent_id',$request->category)->get(['id']);
            if(count($this ->data['cateChild'])){
                $arrCate = [];
                foreach ($this ->data['cateChild'] as $item){
                    array_push($arrCate, $item['id']);
                }
                array_push($arrCate,  intval($request->category));
                $products = Product::whereIn('category_id',$arrCate);
            } 
            else 
            $products = Product::where('category_id',$request->category);
        }
        if(!empty($request->keyword)){
            $products = Product::where('name','LIKE','%'.$request->keyword.'%')
            /* ->orWhere('description', 'LIKE','%'.$request->keyword.'%') */;
        }
        return view('Admin.product.index',[
            'title' => 'Danh sách sản phẩm',
            'products' =>$products->with('category')->paginate(5),
            'categories' => Category::all()
        ]);
        /* $data = Product::with('category')->get();
        dd($data[0]['category']->name) */;
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = Category::all();
        
        return view('Admin.product.create',[
            'title' => 'Thêm sản phẩm mới',
            'categories' => $categorys
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* dd($request->input());  */  
        $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required',
            'price' => 'required',
            'amount' => 'required',
            'file' => 'required|mimes:jpeg,jpg,png',
            'description' => 'required',
            'product_content' => 'required',
        ]); 
        $input =$request->input();
        if($request->hasFile('file')){
            $image = $request->file('file');
            $type = $request->file('file')->extension();
            $image_name = time().'-product.'.$type;
            $path = $image->storeAs('products',$image_name,'public_uploads');

            
            $input['thumb'] = $image_name;
            /* dd($path); */
        }
        $input['sold'] = 0;
        /* dd($input); */
        $post = Product::create($input); 
        return redirect()->route('admin.products.create')->with('msg','Tạo sản phẩm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Product::where('id',$id)->first();
        //dd($item);
       
        $categorys = DB::table('categories')->get();
        return view('Admin.product.edit',[
            'title' => 'Sửa sản phẩm: ' .$item->name,
            'categories' => $categorys,
            'item' => $item
        ]);
        
    }

  
    public function update(Request $request, $id)
    {
       $this->validateForm($request);
       $input = $request->input();
       $item = Product::where('id',$id)->first();
       $input['thumb'] = $item->thumb;
        if($request->hasFile('file')){
            unlink("uploads/products/".$item->thumb);
            $image = $request->file('file');
            $type = $request->file('file')->extension();
            $image_name = time().'-product.'.$type;
            $path = $image->storeAs('products',$image_name,'public_uploads');
            $input['thumb'] = $image_name;
        }
        $item->name = $input['name'];
        $item->category_id = $input['price'];
        $item->amount = $input['amount'];
        $item->sold = $input['sold'];
        $item->price = $input['price'];
        $item->price_sale = $input['sale'];
        $item->category_id = $input[ 'category_id'];
        $item->description = $input[ 'description'];
        $item->product_content = $input[ 'product_content'];
        $item->active = $input['active'];
        $item->active_sale = $input[ 'active_sale'];
        $item->thumb = $input[ 'thumb'];
        /* dd($input); */
        $item->save(); 
        return redirect()->route('admin.products')->with('msg','Sửa thông tin thành công');
    }

   
    public function destroy(Request $request)
    {
        $id =  $request->input('id');
        $product = Product::where('id',$id)->first();
        if($product){
            unlink("uploads/products/". $product->thumb);
            Product::where('id', $id)->delete();
            return response()->json([
                'error' => false,
                'message' => 'Xoá sản phẩm thành công'
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }
    public function setActiveSale(Request $request){
        $id = $request->id;
        $status = $request->status;
        $product = Product::where('id',$id)->first();
        if($status){
            $product->active_sale = 0;
            $product->save(); 
            return response()->json([
                'result' => "true",
                'status' => 'Đã tắt khuyến mãi cho sản phẩm'
            ]);
        }
        else {
            $product->active_sale = 1;
            $product->save(); 
            return response()->json([
                'result' => "true",
                'status' => 'Đã bật khuyến mãi cho sản phẩm'
            ]);
        }
    }
    public function setActive(Request $request){
        $id = $request->id;
        $status = $request->status;
        $product = Product::where('id',$id)->first();
        if($status){
            $product->active = 0;
            $product->save(); 
            return response()->json([
                'result' => "true",
                'status' => 'Đã tạm ẩn sản phẩm'
            ]);
        }
        else {
            $product->active= 1;
            $product->save(); 
            return response()->json([
                'result' => "true",
                'status' => 'Đã hiển thị sản phẩm'
            ]);
        }
    }
    public function validateForm($request){
        $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required',
            'price' => 'required',
            'amount' => 'required',
            'sold' => 'required',
            'description' => 'required',
            'product_content' => '',
        ]);
    }
}
