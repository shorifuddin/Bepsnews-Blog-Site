<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brakingnews;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

class BrakingNewsController extends Controller
{
    public function brakingnews(){
        $brakingnews = Brakingnews::where('brakingnews_id', 1)->first();
        return view('backend.brakingnews.brakingnews', compact('brakingnews'));
    }

    public function brakingnews_update(Request $request){
        // return $request->all();
        $brakingnews = Brakingnews::where('brakingnews_id', 1)->where('brakingnews_status', 1)->firstOrFail();

        $update=Brakingnews::where('brakingnews_id',1)->update([
            'brakingnews_one' => $request['brakingnews_one'],
            'brakingnews_two' => $request['brakingnews_two'],
            'brakingnews_three' => $request['brakingnews_three'],
            'brakingnews_four' => $request['brakingnews_four'],
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($update){
            Session::flash('success','Value');
            return redirect()->route('brakingnews_show');
        }else{
            Session::flash('error','Value');
            return redirect()->back();
        }
    }
}
