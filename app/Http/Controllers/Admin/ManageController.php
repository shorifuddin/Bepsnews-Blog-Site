<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Socialmedia;
use App\Models\Contact;
use App\Models\Basicinfo;
use App\Models\Category;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ManageController extends Controller
{
    public function contact(){
        $contact = Contact::where('contact_id', 1)->first();
        return view('backend.manage.conatctinfo', compact('contact'));
    }

    public function contact_update(Request $request){
        // return $request->all();
        $contact = Contact::where('contact_id', 1)->where('contact_status', 1)->firstOrFail();

        $update=Contact::where('contact_id',1)->update([
            'contact_phone_one' => $request['contact_phone_one'],
            'contact_phone_two' => $request['contact_phone_two'],
            'contact_email_one' => $request['contact_email_one'],
            'contact_email_two' => $request['contact_email_two'],
            'contact_address_one' => $request['contact_address_one'],
            'contact_address_two' => $request['contact_address_two'],
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($update){
            Session::flash('success','Value');
            return redirect()->route('contact_show');
        }else{
            Session::flash('error','Value');
            return redirect()->back();
        }
    }

    public function social(){
        $social = Socialmedia::where('sm_id', 1)->first();
        return view('backend.manage.socialmedia', compact('social'));
    }

    public function social_update(Request $request){
        // return $request->all();
        $contact = Socialmedia::where('sm_id', 1)->where('sm_status', 1)->firstOrFail();

        $update = Socialmedia::where('sm_id',1)->update([
            'sm_facebook' => $request['sm_facebook'],
            'sm_twitter' => $request['sm_twitter'],
            'sm_linkedin' => $request['sm_linkedin'],
            'sm_dribbble' => $request['sm_dribbble'],
            'sm_youtube' => $request['sm_youtube'],
            'sm_slack' => $request['sm_slack'],
            'sm_instagram' => $request['sm_instagram'],
            'sm_behance' => $request['sm_behance'],
            'sm_google' => $request['sm_google'],
            'sm_reddit' => $request['sm_reddit'],
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($update){
            Session::flash('success','Value');
            return redirect()->route('social_show');
        }else{
            Session::flash('error','Value');
            return redirect()->back();
        }
    }
}
