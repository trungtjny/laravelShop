<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {
        
        return view('Admin.category.index',[
            'title' => 'Danh sách danh mục',
            'categories' => Category::all()
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
