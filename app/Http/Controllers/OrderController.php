<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use Auth;
use Mail;
use Redirect;

use App\OmniKassa;
use App\Orders;

class OrderController extends Controller
{

    public function getOrder(){

        $naam = Session::get('user_info')['naam'];

        if(Auth::user() !== null) {
            $user = Auth::user();
        } else {
            // TODO : EMAIL = Session email
        }

        $payment_type = Session::get('user_info')['betaalmethode'];

        // Send Order Submit Mail
        Mail::send('emails.order_bevestiging_mail', ['user' => $user], function ($m) use ($user) {
            $m->from('info@larsmertens.nl', 'Bakkerij van der Westen');
            $m->to('larsmertens_webdesign@hotmail.com')->subject('Order Bevestiging');
        });

        // Send Administration  Mail
        Mail::send('emails.order_bevestiging_admin_mail', ['user' => $user], function ($m) use ($user) {
            $m->from('info@larsmertens.nl', 'Bakkerij van der Westen');
            $m->to('larsmertens_webdesign@hotmail.com')->subject('Order Bevestiging - Administratie');
        });

        return view('order_bevestiging');
    }

    public function handleOmnikassa()
    {
        $ref=$_GET['ref'];

        if(Auth::user() !== null) {
            $transaction = OmniKassa::where('TransactionReference', '=', $ref)->first();

            // check if ref exist in database
            if ($transaction != null) {

                // check if status is succesfull
                if ($transaction['TransactionStatus'] == "SUCCESS") {
                    $TransactionReference = $transaction['TransactionReference'];
                    $OrderId = $transaction['OrderId'];
                    $TransactionStatus = $transaction['TransactionStatus'];

                    // Add this additional info to Orders Table for current user, latest order of user
                    $user_id = Auth::user()->id;

                    // Check if field TransactionReference is empty
                    $latest_user_order = Orders::where('user_id', '=', $user_id)->OrderBy('id', 'desc')->first();

                    if ($latest_user_order != null) {
                        $latest_user_order->TransactionReference = $TransactionReference;
                        $latest_user_order->OrderId = $OrderId;
                        $latest_user_order->TransactionStatus = $TransactionStatus;
                        $latest_user_order->save();
                    }

                    // send email
                    $this->getOrder();
                    return redirect('order-bevestiging-ideal');
                }
            }
        } else {
            // Redirect
        }
    }

    public function getOrderIdeal()
    {
        return view('order_bevestiging');
    }

}
