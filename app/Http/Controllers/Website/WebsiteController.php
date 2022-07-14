<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Postnews;

class WebsiteController extends Controller
{
    public function index(){
        return view('frontend.home.index');
    }

    public function contact(){
        return view('frontend.contact');
    }

    public function category($id){
        $category=Category::where('category_id',$id)->get();
        $alldata=Postnews::where('news_category',$id)->where('news_delete',1)->orderBy('news_id','DESC')->get();
        return view('frontend.category',compact('alldata','category'));

    }

    public function post($id){
        $category=Category::where('category_id',$id)->get();
        $data=Postnews::where('news_id',$id)->where('news_delete',1)->orderBy('news_id','DESC')->first();
        return view('frontend.singlepost',compact('data','category'));
    }

    public function search(Request $request){
        $search = $request['search'] ?? "";
        if ($search != '') {
            $searchitem = Postnews::where('news_title','LIKE',"%$search%")->get();
        }else{
            $searchitem = Postnews::all();
        }
        $data = compact('searchitem','search');
        return view('frontend.search',compact('searchitem','search'));
    }


}
