<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use Paystack;
use App\Mail\MailMember;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Models\foods_lists;

class FoodController extends Controller
{

  private $SMS_SENDER = 'Ccc';
 private $RESPONSE_TYPE = 'json';
 private $SMS_USERNAME = 'kenneyg50@gmail.com';
 private $SMS_PASSWORD = 'Rooneywwe@11';


  public function index()
  {
      $food=foods_lists::all();
    return view('pages.foods.food')->with('foods',$food);
  }

  public function orderFood(Request $request)
  {
    $this->validate($request, [
        'num_of_order' => 'required|numeric|min:0',
        'price' => 'required|numeric|min:0',
        'Name' => 'required|string|max:255',
        'phone' =>['required','numeric','min:0'],
    ]);
    $total_ticket_amount = $request->get('pricekobo') * $request->get('num_of_order');
  $ticket_amount=$request->get('price') * $request->get('num_of_order');

     $order_id = mt_rand(13, rand(100, 99999990));


      $arrayName = array('order_id'=>$order_id,'phone' => $request->get('phone'),'fod'=> $request->get('food') ,'name' =>$request->get('Name'),'email' => $request->get('Email1'),'Amount' =>$ticket_amount);
         $paystack = new Paystack();
         $request->metadata =  $arrayName;
         $user = $request->get('Name');
         $request->email = $request->get('Email1');
         $request->orderID = $order_id;
         $request->amount = $total_ticket_amount;
         $request->quantity =  $request->get('num_of_order');
         $request->reference = Paystack::genTranxRef();
         $request->key = config('paystack.secretKey');



         if ($paystack) {
           $items =  Food::updateOrCreate(
             [ 'name' =>$request->get('Name'),
              'phone' => $request->get('phone'),
              'email' => $request->get('Email1'),
              'food_name' =>$request->get('foodName'),
              'num_of_order' => $request->get('num_of_order'),
              'price' => $request->get('price'),
              'order_id' => $order_id
            ]);
$name=$request->get('Name');

                     $message = "hello $name your pick up token for $order_id  ";
                    $phone_number = $request->get('phone');

                                 //Preparing post parameters
                                       $postData = array(
                                           'username' => $this->SMS_USERNAME,
                                           'password' => $this->SMS_PASSWORD,
                                           'message' => $message,
                                           'sender' =>  $this->SMS_SENDER,
                                           'mobiles' => $phone_number,
                                           'response' => $this->RESPONSE_TYPE
                                       );
                                       $url ="http://portal.nigeriabulksms.com/api/";

                                              $ch = curl_init();

                                              curl_setopt_array($ch, array(
                                                  CURLOPT_URL => $url,
                                                  CURLOPT_RETURNTRANSFER => true,
                                                  CURLOPT_POST => true,
                                                  CURLOPT_POSTFIELDS => $postData
                                              ));


                                             // Ignore SSL certificate verification
                                              curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                                              curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

                                             // Print error if any
                                    if (curl_errno($ch)) {
                                        $isError = true;
                                        $errorMessage = curl_error($ch);
                                       // var_dump($errorMessage);
                                    }
                               $resp = curl_exec($ch);
                               print_r($resp);
                     //  dd($resp);
                             // echo $resp; // Add double slash or delete “echo”
                           // echo "<br>Thank you for using Bulk SMS Nigeria API"; // Your notification message here
                             curl_close($ch);

         }

          return Paystack::getAuthorizationUrl()->redirectNow();
  }


}
