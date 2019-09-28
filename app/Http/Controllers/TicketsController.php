<?php

namespace App\Http\Controllers;
use App\Models\Tickets;
use App\Models\User_tickets;
use App\Mail\MailMember;
use App\Models\Events;
use App\Models\events_tickets;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Paystack;

use Illuminate\Http\Request;

class TicketsController extends Controller
{


  public function index()
  {
    return view('pages.tickets.tickets')->with([
      'Events' =>  Events::orderBy('created_at','desc')->paginate(10)
    ]);

  }

  public function load_form($id)
  {
    $TICKECT=events_tickets::where('event_id', '=',$id)->get();
    //dd($TICKECT);
        return view('pages.tickets.ticket',compact('id', $id,'TICKECT',$TICKECT));
  }
  public function createPackage(Request $request)
    {

    //  dd($request->get('event_id'));

      $this->validate($request, [
          'Name' => 'required|string|max:255',
          'phone' =>['required','numeric','min:0',Rule::unique('tickets','phone')],
          'Email1' => 'required|string|max:255',
          'tickect_name' =>'required|string|max:255',
          'num_ticket' =>'required|string|max:255',

      ]);

       $user_id = mt_rand(13, rand(100, 99999990));
       $Exists=Tickets::where('email', $request->get('Email1'))->exists();
        if(!$Exists){

          $ticket_name=$request->get('tickect_name');

  $getid12=events_tickets::where('id', $ticket_name)
  ->where('event_id',$request->get('event_id'))  ->first();
$price= $getid12->price;
$kbprice= $getid12->price.'00';
$ticket_name2 =$getid12->ticket_name;
$total_ticket_amount = $kbprice * $request->get('num_ticket');
$ticket_amount=$price * $request->get('num_ticket');

                $items =  Tickets::updateOrCreate(
              [ 'name' =>$request->get('Name'),
               'phone' => $request->get('phone'),
               'email' => $request->get('Email1'),
               'user_id' => $user_id
             ]);

             $items =  User_tickets::create(array(
               'event_id' =>$request->get('event_id'),
                'ticket_name' =>$ticket_name2,
                'quantity' => $request->get('num_ticket'),
                'user_id' => $user_id
               ));

               // $getid2=User_tickets::where('user_id', $user_id)
               // ->first();
            $arrayName = array('phone' => $request->get('phone'),'fod'=> $request->get('food') ,'name' =>$request->get('Name'),'email' => $request->get('Email1'),'Amount' =>$ticket_amount);
               $paystack = new Paystack();
               $request->metadata =  $arrayName;
               $user = $request->get('Name');
               $request->email = $request->get('Email1');
               $request->orderID = $user_id;
               $request->amount = $total_ticket_amount;
               $request->quantity =  $request->get('num_ticket');
               $request->reference = Paystack::genTranxRef();
               $request->key = config('paystack.secretKey');

// $se=Paystack::getAuthorizationUrl();
// $amount=$se->Response;
// dd($amount);
//dd(Paystack::getAuthorizationUrl());
//dd(Paystack::getResponse());

          // $ticket_name=$request->get('tickect_name');
          // if($ticket_name=='Gold')
          // {
          //     $total_ticket_amount=5000 * $request->get('num_ticket');
          //     $ticket_amount=5000;
          // }
          // elseif ($ticket_name=='Regular') {
          //       $total_ticket_amount=2500 * $request->get('num_ticket');
          //     $ticket_amount=2500;
          // }
          // else {
          //     $total_ticket_amount=10000 * $request->get('num_ticket');
          //   $ticket_amount=10000;
          // }
          // $getid=Tickets::where('email', $request->get('Email1'))
          //   ->where('name',$request->get('Name'))
          // ->first();
          //  $items = Tickets::where('email', $request->get('Email1'))
          //    ->where('name',$request->get('Name'))->update([ 'name' =>$request->get('Name'),
          //     'phone' => $request->get('phone'),
          //     'email' => $request->get('Email1')
          //   ]);
          // // $items =  Tickets::updateOrCreate(
          // //     [ 'name' =>$request->get('Name'),
          // //      'phone' => $request->get('Phone'),
          // //      'email' => $request->get('Email1')
          // //    ]);
          //
          //    $items =  User_tickets::create(array(
          //       'ticket_name' =>$request->get('tickect_name'),
          //       'quantity' => $request->get('num_ticket'),
          //       'user_id' => $getid->user_id
          //      ));
          //      $getid2=User_tickets::where('user_id', $getid->user_id)
          //      ->first();
          //      $arrayName = array('phone' => $request->get('phone'),'name' =>$request->get('Name'),'email' => $request->get('Email1'));
          //     $paystack = new Paystack();
          //     $request->metadata =  $arrayName;
          //      $user = $request->get('Name');
          //      $request->email = $request->get('Email1');
          //      $request->orderID = $getid2->id;
          //      $request->amount = $total_ticket_amount;
          //      $request->quantity =  $request->get('num_ticket');
          //      $request->reference = Paystack::genTranxRef();
          //      $request->key = config('paystack.secretKey');
        }
        else{
          $message ='Email ALready Used .....!';
       return redirect()->back()->with('serrortatus', $message);
          // $ticket_name=$request->get('tickect_name');
          // if($ticket_name=='Gold')
          // {
          //     $total_ticket_amount=5000 * $request->get('num_ticket');
          //     $ticket_amount=5000;
          // }
          // elseif ($ticket_name=='Regular') {
          //       $total_ticket_amount=2500 * $request->get('num_ticket');
          //     $ticket_amount=2500;
          // }
          // else {
          //     $total_ticket_amount=10000 * $request->get('num_ticket');
          //   $ticket_amount=10000;
          // }
          //   $items =  Tickets::updateOrCreate(
          //     [ 'name' =>$request->get('Name'),
          //      'phone' => $request->get('phone'),
          //      'email' => $request->get('Email1'),
          //      'user_id' => $user_id
          //    ]);
          //
          //    $items =  User_tickets::create(array(
          //       'ticket_name' =>$request->get('tickect_name'),
          //       'quantity' => $request->get('num_ticket'),
          //       'user_id' => $user_id
          //      ));
          //
          //      $getid2=User_tickets::where('user_id', $user_id)
          //      ->first();
          //   $arrayName = array('phone' => $request->get('phone'),'name' =>$request->get('Name'),'email' => $request->get('Email1'));
          //      $paystack = new Paystack();
          //      $request->metadata =  $arrayName;
          //      $user = $request->get('Name');
          //      $request->email = $request->get('Email1');
          //      $request->orderID = $getid2->id;
          //      $request->amount = $total_ticket_amount;
          //      $request->quantity =  $request->get('num_ticket');
          //      $request->reference = Paystack::genTranxRef();
          //      $request->key = config('paystack.secretKey');
        }


        return Paystack::getAuthorizationUrl()->redirectNow();

      // $items =  Tickets::updateOrCreate(
      //   [ 'name' =>$request->get('Name'),
      //    'phone' => $request->get('Phone'),
      //    'email' => $request->get('Email1'),
      //    'user_id' => $user_id
      //  ]);
      //


           //                            \QrCode::size(500)
           // ->format('png')
           // ->generate('ItSolutionStuff.com', public_path('images/qrcode.png'));

  // dd($items);
          // $amount =200000;
          // $message ='Post has been successfully added!';
          // $number =$request->get('Phone');
          // $name=$request->get('Name');
          // $email =$request->get('Email1');
          // $tick =$request->get('num_ticket');
          // $tick_name =$request->get('tickect_name');
          // return redirect()->route("payment")->with([
          //  'email' => $email,
          //  'name'=> $name,
          //  'number' => $number,
          //  'amount'  =>$amount,
          //  'user_id' => $user_id,
          //  'num_ticket' =>$tick,
          //  'tickect_name' =>$tick_name
          //   ]);

           // return redirect()->route("qr-code-g")->with([
           //  'email' => $email,
           //  'name'=> $name,
           //  'number' => $number
           //
           //   ]);
          // return redirect()->back()->with('status', $message);


    }

    public function paymentpage()
    {
          return view('pages.paystack.payment');
    }

    /**
       * Redirect the User to Paystack Payment Page
       * @return Url
       */
     //   public function redirectToGateway(Request $request)
     // {
     //
     //     $paystack = new Paystack();
     //     $user = $request->get('user_id');
     //     $request->email = $request->get('email');
     //     $request->orderID = $request->get('tickect_name');
     //     $request->amount = $request->get('amount');
     //     $request->quantity =  $request->get('num_ticket');
     //     $request->reference = Paystack::genTranxRef();
     //     $request->key = config('paystack.secretKey');
     //     return Paystack::getAuthorizationUrl()->redirectNow();
     //  }



     public function handleGatewayCallback2()
     {
    return view('pages.tickets.qrCode');
     }
      /**
       * Obtain Paystack payment information
       * @return void
       */
      public function handleGatewayCallback()
      {
       $paymentDetails = Paystack::getPaymentData();

//dd($paymentDetails);
 //dd($paymentDetails['data']['metadata']['Amount']);
      //  dd($paymentDetails['data']['customer']['email']);
          // Now you have the payment details,
          // you can store the authorization_code in your db to allow for recurrent subscriptions
          // you can then redirect or do whatever you want
$amount=$paymentDetails['data']['metadata']['Amount'];
$satus=$paymentDetails['data']['status'];
$reference=$paymentDetails['data']['reference'];
$gateway_response=$paymentDetails['data']['gateway_response'];
$useremail=$paymentDetails['data']['customer']['email'];
$check=$paymentDetails['data']['metadata']['fod'];


//dd($check);

 if($check!=="food"){

    $number=$paymentDetails['data']['metadata']['phone'];
    $email=$useremail;
    $name=$paymentDetails['data']['metadata']['name'];
    $rand=rand(100,9999);

    $getid2=Tickets::where('email', $useremail)->first();
      $getid12=User_tickets::where('user_id', $getid2->user_id)->first();


       DB::table('user_tickets')
                  ->where('user_id', $getid2->user_id)
                  ->update([
                    'amount' =>$amount,
                    'payment_status' => $satus
                  ]);
                  DB::table('tickets')
                             ->where('user_id', $getid2->user_id)
                             ->update([
                               'ticket_id' =>  $getid12->id
                             ]);

      //   $rand=rand(100,9999);
      $qrCode=\QrCode::size(500)
        ->format('png')
        ->generate($number.'_'.$rand, public_path('qrcode/'.$rand.'_qrcode.png'));
        $img =public_path().'/qrcode/'.$rand.'_qrcode.png';
         //dd($img);
        // $message = "hello '.$name.'   '.$email.'   '.$number.' your pick up token is '.$qrCode.' ";

        //send token via email

       $data = array('orderID'=>$getid2->user_id,'images'=>$img,'number'=>$number,'ran'=>$rand, 'email' => $email,'fname' => $name,'app_name' => config('app.name'), 'from' => 'noreply@afrochella.com', 'from_name' => 'afrochella');
        Mail::send( 'mails.member_token', $data, function($message) use ($data)
        {
            $message->to( $data['email'] )->from( $data['from'], $data['fname'] )->subject( 'Welcome!' );

        });

 }else {
   $order_id=$paymentDetails['data']['metadata']['order_id'];
   $number=$paymentDetails['data']['metadata']['phone'];
   $email=$useremail;
   $name=$paymentDetails['data']['metadata']['name'];
   $rand=rand(100,9999);

   DB::table('foods')
              ->where('order_id', $order_id)
              ->update([
                'amount' =>$amount,
                'payment_status' => $satus
              ]);

     //   $rand=rand(100,9999);
     $qrCode=\QrCode::size(500)
       ->format('png')
       ->generate($number.'_'.$rand, public_path('qrcode/'.$rand.'_qrcode.png'));
       $img =public_path().'/qrcode/'.$rand.'_qrcode.png';
        //dd($img);
      //  $message = "hello $name.''.$email.'   '.$number.' your pick up token is '.$qrCode.' ";

       //send token via email
       $data = array('orderID'=>$order_id,'images'=>$img,'number'=>$number,'ran'=>$rand, 'email' => $email,'fname' => $name,'app_name' => config('app.name'), 'from' => 'noreply@afrochella.com', 'from_name' => 'afrochella');

       Mail::send( 'mails.member_token', $data, function($message) use ($data)
       {
           $message->to( $data['email'] )->from( $data['from'], $data['fname'] )->subject( 'Welcome!' );

       });

 }






                    return view('pages.tickets.qrCode')->with('ran',$rand);
      }

//     public function buildQrCode()
//     {
//
//   $number=session('number');
//       $rand=rand(100,9999);
//     $qrCode=\QrCode::size(500)
//                 ->format('png')
//                 ->generate($number.'_'.$rand, public_path('qrcode/'.$rand.'_qrcode.png'));
//
//
//                 $email=session('email');
//                 $name=session('name');
//
// // $img =public_path().'/qrcode/'.$rand.'_qrcode.png';
// //  //dd($img);
// //  $message = "hello '.$name.'   '.$email.'   '.$number.' your pick up token is '.$qrCode.' ";
// //
// // //send token via email
// // $data = array('images'=>$img,'ran'=>$rand, 'email' => $email,'mess'=>$message,'fname' => $name,'app_name' => config('app.name'), 'from' => 'noreply@afrochella.com', 'from_name' => 'afrochella','number' => $number);
// //
// // Mail::send( 'mails.member_token', $data, function($message) use ($data)
// // {
// //     $message->to( $data['email'] )->from( $data['from'], $data['fname'] )->subject( 'Welcome!' );
// //
// // });
//
//
//                 // $qrCode = new QrCode( $code. '-'.rand(10000,999999) );
//                 //              $locationDir = '\clips_qrg';
//                 //              $locationDir = __DIR__.'/qrcode.png';
//                 //
//                 //              $qrCode->writeFile($locationDir);
//
// // dd($qrcode);
//         return view('pages.tickets.qrCode')->with('ran',$rand);
//     }


}
