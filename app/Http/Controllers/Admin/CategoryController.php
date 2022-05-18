<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Response;
use PhpParser\Node\Expr\Cast\Array_;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {
        $categorys = new Category(); 
        $categorys =  $categorys::all();
        foreach ($categorys as $c){
            if($c->active == 0) $c->active = "Đang ẩn";
            else $c->active = "Đang hiển thị";
        }
        return view('Admin.category.index',[
            'title' => 'Danh sách danh mục',
            'categories' => $categorys
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = Category::where('parent_id', 0)->orderBy('parent_id')->get();
        
        return view('Admin.category.create',[
            'title' => 'Thêm danh mục',
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
        $request->validate([
            'name' =>'required|min:6',
        ], [
            'name.required' =>'Tên danh mục không được để trống.',
            'name.min' => 'Tên danh mục quá ngắn.',
        ]);
        $category = new Category();
        $category->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'description' => $request->description,
            'active' => $request->active
        ]);
        return redirect()->route('admin.category.create')->with('msg','Tạo danh mục thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
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
        $item = Category::where('id',$id)->first();
       
        $categorys = Category::where('parent_id', 0)->orderBy('parent_id')->get();
        
        return view('Admin.category.edit',[
            'title' => 'Sửa danh mục: '.$item->name,
            'categories' => $categorys,
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' =>'required|min:6',
        ], [
            'name.required' =>'Tên danh mục không được để trống.',
            'name.min' => 'Tên danh mục quá ngắn.',
        ]);
       
        $item =  Category::where('id',$id)->first();
        $item->name = $request->input('name');
        if($item->id != $request->input('parent_id')) $item->parent_id = $request->input('parent_id');
        $item->description = $request->input('description');
        $item->active = $request->input('active');
        


        if($item->parent_id != 0){
            $parent = Category::where('id',$item->parent_id)->first();
            if($parent->active == 0){
                return back()->withInput()->with('error','Lỗi!!! Danh mục cha đang bị ẩn- không thể hiển thị danh mục con');
            }
            else {
                $products = Product::where("category_id",$id)->get(['active']);
                if(count($products)){
                    foreach($products as $product){
                        $product->active = $request->input('active');
                        $product->save();
                    }
                }
            }
        }
        else{
            $catechild = Category::where("parent_id",$item->id)->get(['id']);
            if(count($catechild)){
                $arrCate = [];
                foreach ($catechild as $cate){
                    $cate->active = $request->input('active');
                    $cate->save();
                    array_push($arrCate, $cate['id']);
                }
                /* dd("Memu cha"); */
                $products = Product::whereIn('category_id',$arrCate)->get(['id']);
            }
            else $products = Product::where('category_id',$item->id)->get(['id']);
            foreach($products as $p){
                $p->active = $request->input('active');
                $p->save();
                
            }
        }
        $item->save();
        return redirect()->route('admin.category')->with('msg','Sửa danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id =  $request->input('id');
        $category = new Category();
        $category = Category::where('id',$id)->first();
        if($category){
            Category::where('id', $id)->orWhere('parent_id',$id)->delete();
            return response()->json([
                'error' => false,
                'message' => 'Xoá danh mục thành công'
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }
}
