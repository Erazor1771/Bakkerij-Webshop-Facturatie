<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Tijdschema;
use App\Users_Info;
use App;
use Auth;
use Response;
use View;
use Schema;
use Session;

class TijdschemaController extends Controller
{

    public function paymentPath()
    {

        $payment_type = Input::get('betalen');

        if($payment_type == 'contant') {
            if($this->handleContanteBetaling($payment_type)){

                return Redirect::to('order-bevestiging');
            } else{
                // TODO : implement
            }
        } else if($payment_type == 'ideal'){
            $this->handleIdealBetaling($payment_type);
        }

    }

    /**
     * Include Omnikassa files
     * @return bool
     */
    public function handleIdealBetaling($payment_type)
    {
        $totaalprijs = $this->handleIdealBetalingPre($payment_type);
        require(public_path() . '/omnikassa/start.php');
        return true;
    }

    public function handleIdealBetalingPre($payment_type)
    {
        // TODO : IMPLEMENT ORDER RULES
        $rules = array();

        // get submitted user data ...
        $naam = Input::get('naam');
        $datum = Input::get('datum');
        $tijd = Input::get('tijd');
        $type = Input::get('type');
        $straatnaam = Input::get('straatnaam');
        $huisnummer = Input::get('huisnummer');
        $woonplaats = Input::get('woonplaats');
        $postcode = Input::get('postcode');
        $telefoonnummer = Input::get('telefoonnummer');
        $totaalprijs = $this->checkVerzendkosten(Input::get('totaalprijs'), $type);
        $cart = Input::get('cart');

        // checkverzendkosten

        // create our user
        $user_data = array(
            'naam' => $naam,
            'datum' => $datum,
            'tijd' => $tijd,
            'type' => $type,
            'betaalmethode' => ucfirst($payment_type),
            'postcode' => $postcode,
            'telefoonnummer' => $telefoonnummer,
            'factuurwoonplaats' => $woonplaats,
            'factuurstraatnaam' => $straatnaam,
            'factuurpostcode' => $postcode,
            'factuurhuisnummer' => $huisnummer,
            'cart' => $cart,
            'totaalprijs' => $totaalprijs
        );

        if(Auth::user() !== null) {
            // get user id
            $user_id = Auth::user()->id; // id in database table users

            // fill order table in database
            App\Orders::create([
                'user_id' => $user_id,
                'order_type' => $type,
                'payment_type' => $payment_type,
                'products_list' => $cart,
                'totalprice' => $totaalprijs
            ]);
        }

        // Put data in SESSION array for the order page...
        $this->saveUserDataForOrder($user_data);

        return $totaalprijs;
    }

    public function handleContanteBetaling($payment_type)
    {
        // TODO : IMPLEMENT ORDER RULES
        $rules = array();

        // get submitted user data ...
        $naam = Input::get('naam');
        $datum = Input::get('datum');
        $tijd = Input::get('tijd');
        $type = Input::get('type');
        $straatnaam = Input::get('straatnaam');
        $huisnummer = Input::get('huisnummer');
        $woonplaats = Input::get('woonplaats');
        $postcode = Input::get('postcode');
        $telefoonnummer = Input::get('telefoonnummer');
        $totaalprijs = $this->checkVerzendkosten(Input::get('totaalprijs'), $type);
        $cart = Input::get('cart');


        // create our user
        $user_data = array(
            'naam' => $naam,
            'datum' => $datum,
            'tijd' => $tijd,
            'type' => $type,
            'betaalmethode' => ucfirst($payment_type),
            'postcode' => $postcode,
            'telefoonnummer' => $telefoonnummer,
            'factuurwoonplaats' => $woonplaats,
            'factuurstraatnaam' => $straatnaam,
            'factuurpostcode' => $postcode,
            'factuurhuisnummer' => $huisnummer,
            'cart' => $cart,
            'totaalprijs' => $totaalprijs
        );

        if(Auth::user() !== null) {
            // get user id
            $user_id = Auth::user()->id; // id in database table users


            // fill order table in database
            App\Orders::create([
                'user_id' => $user_id,
                'order_type' => $type,
                'payment_type' => $payment_type,
                'products_list' => $cart,
                'totalprice' => $totaalprijs
            ]);
        }

        // Put data in SESSION array for the order page...
        $this->saveUserDataForOrder($user_data);

        return true;
    }

    public function checkVerzendkosten($totaalprijs, $type)
    {
        if(strpos($type, 'Bezorgen') !== false){
            if($totaalprijs <= 10.00) {
                $totaalprijs = $totaalprijs + 2.50;
            }
        }

        return $totaalprijs;
    }

    public function saveUserDataForOrder($user_data_array)
    {
        Session::put('user_info', $user_data_array);
        $user_session_array = Session::get('user_info');
        return $user_session_array;
    }


    public function getCustomerInfo()
    {

        $user_array = array();

        if(Session::get('user_factuur_info') !== null){
            $user_data = Session::get('user_factuur_info');
        } else {
                if (Auth::check()) {
                    $id = Auth::user()->id; // id in database table users
                    $email =  Auth::user()->email; // email of user
                    $user_array = array('user' => $email);

                    // Retrieve user NAW data
                    $user_data = Users_Info::select('voornaam', 'tussenvoegsel', 'achternaam', 'telefoonnummer','factuurstraatnaam', 'factuurwoonplaats', 'factuurhuisnummer', 'factuurpostcode')
                                             ->where('user_id', $id)->get();


                } else if(Auth::viaRemember()){
                    $email = Auth::user()->email;
                    $user_array = array('user' => $email);
                }
                else {

                    // TODO:validation not successful, send back to login form
                }
        }

        return Response::json($user_data);

    }

    public function generateTijdschema($location, $type, $today)
    {
        //$arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
        // {"a":1,"b":2,"c":3,"d":4,"e":5}

        $multiarray = array();

        $tijdschema = Tijdschema::where('lokatie', $location)->where('type', $type)->get();

        $columns = Schema::getColumnListing('tijdschema');

        foreach($tijdschema as $tijden){

            for($i = 3; $i < 9; $i++){
                if($tijden[$columns[$i]] != '') {

                    if($today != ucfirst($columns[$i])){

                        date_default_timezone_set('Europe/Amsterdam');
                        $tijd_controle = date('h', time());
                        if($i == 4){
                            if($tijd_controle < 16) {
                                $data = array(
                                    'day' => ucfirst($columns[$i]),
                                    'time' => $tijden[$columns[$i]]
                                );
                                array_push($multiarray, $data);
                            }
                        } else {
                            $data = array(
                                'day' => ucfirst($columns[$i]),
                                'time' => $tijden[$columns[$i]]
                            );
                            array_push($multiarray, $data);
                        }

                    }
                }
            }
        }

        return Response::json($multiarray);

    }

}
