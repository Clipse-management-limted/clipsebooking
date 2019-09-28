<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;
use App\Mail\MailMember2;
use Illuminate\Support\Facades\Mail;

class EventsController extends Controller
{
    //


    public function welcome()
    {
      return view('welcome')->with([
        'Events' =>  Events::all()
      ]);
    }

    public function contactus()
    {
      return view('pages.contact.contact');
    }


    public function  sendEmail(Request $request){
        $data = array(
                     'name' => $request->Name,
                        'email'=>$request->Email1,
                      'contactSubject'=>$request->contactSubject,
                        'messagetext'=>$request->c_message
                    );

                //    dd($data);

        Mail::send('mails.member', $data, function ($message) use ($request){
            /* Config **** */
            $to_email = "kenneyg50@gmail.com";
            $to_name  = config('app.name');
            $subject  = $request->contactSubject;
            $message->subject ($subject);
            $message->from ($request->Email1, $request->Name);
            $message->to ($to_email, $to_name);
        });
      //  dd(Mail);
        if(count(Mail::failures()) > 0){
            $status = 'Error something Went Wrong';
        } else {
            $status = 'Mail Sent Successfully Thank You ....';
        }
    //       echo json_encode($status);
    // exit;

 return redirect()->back()->with('status', $status );
  // return \Response::json(['status' => 'Mail Sent Successfully Thank You .....'], 200);
    }



}
