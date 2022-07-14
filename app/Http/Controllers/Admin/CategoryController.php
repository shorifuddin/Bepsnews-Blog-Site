<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $alldata=Category::where('category_status',1)->orderBy('category_id','DESC')->get();
        return view('backend.category.all',compact('alldata'));
    }

    public function add(){
        return view('backend.category.add');
    }

    public function insert(Request $request){
        $validated = $request->validate([
            'category_name' => 'required|max:255',

        ],[
            'category_name.required'=>'Fill The Tile',

        ]);
        if ($request->hasFile('category_image')) {
            $category_image = $request->file('category_image');
            $image_name = time() . '_' . rand(100000, 10000000) . '.' . $category_image->getClientOriginalExtension();
            Image::make($category_image)->resize(720, 720)->save('upload/website/category/' . $image_name);

        }else{
            $image_name = '';
        }

        $insert=Category::insert([
            'category_name' => $request->category_name,
            'category_image' => $image_name,
            'category_slug' => Str::slug($request->category_name),
            'category_creator' => Auth::user()->id,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($insert){
            Session::flash('success','Value');
            return redirect()->route('category_all');
        }else{
            Session::flash('error','Value');
            return redirect()->route('category_add');
        }
    }

    public function view($id){
        $data=Category::where('category_id',$id)->firstOrFail();
        return view('backend.category.view',compact('data'));
    }

    public function edit($id){
        $data=Category::where('category_id',$id)->firstOrFail();
         return view('backend.category.edit',compact('data'));
    }

    public function update(Request $request, $id ){
         $request->validate([
            'category_name' => 'required|max:255',
        ]);
        $updatecategory = Category::where('category_id', $id)->first();
        if ($request->hasFile('category_image')) {
            if (File::exists('upload/website/category/'.$updatecategory->category_image)) {
                File::delete('upload/website/category/'.$updatecategory->category_image);
            }
            $category_image = $request->file('category_image');
            $image_name = time() . '_' . rand(100000, 10000000) . '.' . $category_image->getClientOriginalExtension();
            Image::make($category_image)->resize(720, 720)->save('upload/website/category/' . $image_name);
        }else{
            $image_name = $updatecategory->category_image;
        }

        $update = Category::where('category_id',$id)->update([
            'category_name' => $request->category_name,
            'category_image' => $image_name,
            'category_slug' => Str::slug($request->category_name),
            'category_editor' => Auth::user()->id,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($update){
            Session::flash('success','Value');
            return redirect()->route('category_all');
        }else{
            Session::flash('error','Value');
            return redirect('/dashboard/category/edit/'.$id);
        }
    }

    public function softdelete($id){
        $softdelete=Category::where('category_status',1)->where('category_id',$id)->update([
            'category_status'=> 0,
        ]);
        if($softdelete){
            Session::flash('success','Value');
            return redirect()->route('category_all');
        }else{
            Session::flash('error','Value');
            return redirect()->route('category_all');
        }
    }
    public function restoredata(){
        $alldata=Category::where('category_status',0)->orderBy('category_id','ASC')->get();
        return view('backend.category.restore',compact('alldata'));
    }
    public function restore($id){
        $restore=Category::where('category_status',0)->where('category_id',$id)->update([
            'category_status'=> 1,
        ]);
        if($restore){
            Session::flash('success','Value');
            return redirect()->route('category_all');
        }else{
            Session::flash('error','Value');
            return redirect()->route('category_all');
        }
    }
    public function delete($id){
        $delete=Category::where('category_status',0)->where('category_id',$id)->delete();

        if ($delete) {
            Session::flash('success','Value');
           return redirect()->route('category_all');
        }else{
            Session::flash('error','Value');
            return redirect()->route('category_all');

        }
    }
}
