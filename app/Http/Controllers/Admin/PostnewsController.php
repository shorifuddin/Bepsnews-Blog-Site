<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Postnews;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PostnewsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function all(){
        $alldata=Postnews::where('news_delete',1)->orderBy('news_id','DESC')->get();
        return view('backend.news.all',compact('alldata'));
    }

    public function add(){
        $categorydata=Category::all();
        return view('backend.news.add',compact('categorydata'));
    }

    public function insert(Request $request){
        // return $request;
        $validated = $request->validate([
            'news_title' => 'required|max:100',
            'news_subtitle' => 'required|max:100',
            'news_category' => 'required|max:100',

        ],[
            'news_title.required'=>'Fill The NEWS-TITLE',
            'news_subtitle.required'=>'Fill NEWS SUB-TITLE',
            'news_category.required'=>'Fill The NEWS-Category',

        ]);

        // // NEWS FEATURE Image Update
        if ($request->hasFile('news_image')) {
            $news_image = $request->file('news_image');
            $news_image_name = 'news_image' . time() . '_' . rand(100000, 10000000) . '.' . $news_image->getClientOriginalExtension();
            Image::make($news_image)->resize(720, 720)->save('upload/news/' . $news_image_name);
        }else{
            $news_image_name = '';
        }

        // Multiple Image NEWS
        if($request->file('news_gallery')){
            $gallerys = $request->file('news_gallery');
            foreach($gallerys as $gallery){
                $gallery_name = 'news_gallery' . '_' . rand(100000, 10000000) . '.' . $gallery->getClientOriginalExtension();
                Image::make($gallery)->resize(720, 720)->save('upload/news/gallery/' . $gallery_name);
                $data[] = $gallery_name;
            }
        }else{
            $data[] = '';
        }
        $insetnews = Postnews::insert([
            'news_title' => $request->news_title,
            'news_subtitle' => $request->news_subtitle,
            'news_category' => $request->news_category,
            'news_details' => $request->news_details,
            'news_image' => $news_image_name,
            'news_gallery' => implode(',', $data),
            'news_feature' => $request->news_feature,
            'news_tranding' => $request->news_tranding,
            'news_latest' => $request->news_latest,
            'news_hot' => $request->news_hot,
            'news_creator' => Auth::user()->id,
            'news_slug' => Str::slug($request->news_title,'-',rand(10, 12580)),
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($insetnews) {
            Session::flash('success', 'News Created successfully');
            return redirect()->route('news_all');
        } else {
            Session::flash('error', 'News Created Failed');
            return redirect()->back();
        }
    }

    public function edit($id){
        $categorydata=Category::all();
        $data=Postnews::where('news_id',$id)->first();
        return view('backend.news.edit',compact('data','categorydata'));
    }

    public function update(Request $request , $id){
        // return $request;
        $validated = $request->validate([
            'news_title' => 'required|max:100',

        ],[
            'news_title.required'=>'Fill The NEWS-TITLE',

        ]);

        $id = $request->news_id;
        $news = Postnews::where('news_delete',1)->where('news_id', $id)->firstOrFail();

        if ($request->hasFile('news_image')) {
            if (File::exists('upload/news/'.$news->news_image)) {
                File::delete('upload/news/'.$news->news_image);
            }

        $pic = $request->file('news_image');
        $imgname = 'news'. time() . '.' .$pic->getClientOriginalExtension();
        Image::make($pic)->save('upload/news/'.$imgname);
        }else{
            $imgname = $news->news_image;
        }

        $update = Postnews::where('news_id',$id)->update([
            'news_title' => $request->news_title,
            'news_subtitle' => $request->news_subtitle,
            'news_category' => $request->news_category,
            'news_details' => $request->news_details,
            'news_image' => $imgname,
            'news_feature' => $request->news_feature,
            'news_tranding' => $request->news_tranding,
            'news_latest' => $request->news_latest,
            'news_hot' => $request->news_hot,
            'news_creator' => Auth::user()->id,
            'news_status' => $request->news_status,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($update){
            Session::flash('success','Value');
            return redirect()->route('news_all');
        }else{
            Session::flash('error','Value');
            return redirect()->route('news_edit',$id);
        }
    }

    public function view($id){
        $data=Postnews::where('news_delete',1)->where('news_id',$id)->first();
        return view('backend.news.view',compact('data'));
    }

    public function softdelete($id){
        $softdelete=Postnews::where('news_delete',1)->where('news_id',$id)->update([
            'news_delete'=> 0,
        ]);
        if($softdelete){
            Session::flash('success','Value');
            return redirect()->route('news_all');
        }else{
            Session::flash('error','Value');
            return redirect()->back();
        }
    }

    public function restoredata(){
        $alldata=Postnews::where('news_delete',0)->orderBy('news_id','ASC')->get();
        return view('backend.news.restore',compact('alldata'));
    }

    public function restore($id){
        $restore = Postnews::where('news_delete',0)->where('news_id',$id)->update([
            'news_delete'=> 1,
        ]);
        if($restore){
            Session::flash('success','Value');
            return redirect()->route('news_all');
        }else{
            Session::flash('error','Value');
            return redirect()->back();
        }
    }

    public function delete($id){
        $delete = Postnews::where('news_delete',0)->where('news_id',$id)->delete();

        if ($delete) {
            Session::flash('success','Value');
           return redirect()->route('news_all');
        }else{
            Session::flash('error','Value');
            return redirect()->back();
        }
    }

}


