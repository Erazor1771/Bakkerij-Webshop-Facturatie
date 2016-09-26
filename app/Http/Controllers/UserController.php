<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Auth;
use App;
use Hash;
use DB;
use View;
use Session;
use Cookie;


class UserController extends Controller
{

    public function checkLogin()
    {

        if (Auth::check()) {
            return Redirect::to('bestelkeuze');
        } else {
            return view('login');
        }

    }

    public function doLogin()
    {


        App::setLocale('nl');

        // validate the info, create rules for the inputs
        $rules = array(
            'email' => 'required|email', // make sure the email is an actual email
            'password' => 'required|min:3' // password can only be alphanumeric and has to be greater than 3 characters
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('login')
                ->withErrors($validator)// send back all errors to the login form
                ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {

            // create our user data for the authentication
            $userdata = [
                'email' => Input::get('email'),
                'password' => Input::get('password')
            ];

            // attempt to do the login
            if (Auth::attempt($userdata, true)) {

                    return Redirect::to('bestelkeuze');

                // validation successful!
                // echo Auth::user()->email;

            } else {

                // validation not successful, send back to form
                return Redirect::to('login')
                    ->withErrors($validator)// send back all errors to the login form
                    ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form;

            }

        }
    }

    public function registerUser()
    {

        App::setLocale('nl');

        // validate the info, create rules for the inputs
        $rules = array(
            'titel' => 'required|min:4|string',
            'voornaam' => 'required|min:1|max:50|string',
            'tussenvoegsel' => 'min:2|max:10|string',
            'achternaam' => 'required|min:2|max:50|string',
            'bedrijfsnaam' => 'min:2|max:100|string',
            'woonplaats' => 'required|min:2|max:100|string',
            'straatnaam' => 'required|min:2|max:100|string',
            'huisnummer' => 'required|min:1|max:16|string',
            'postcode' => 'required|min:6|max:7|string',
            'telefoonnummer' => 'required|min:8|max:16|string',
            'checkfactuur' => '',
            'factuurwoonplaats' => 'required|min:2|max:100|string',
            'factuurstraatnaam' => 'required|min:2|max:100|string',
            'factuurpostcode' => 'required|min:6|max:7|string',
            'factuurhuisnummer' => 'required|min:1|max:16|string',
            'email' => 'required|unique:users,email|email', // make sure the email is an actual email
            'password' => 'required|min:3|max:200', // password can only be alphanumeric and has to be greater than 3 characters
            'password_confirmation' => 'required|min:3|max:200|same:password' // password can only be alphanumeric and has to be greater than 3 characters
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('registreren')
                ->withErrors($validator)// send back all errors to the login form
                ->withInput(Input::except('password')); // send back the input (not the passwords) so that we can repopulate the form
        } else {

            // get submitted user data ...
            $titel = Input::get('titel');
            $voornaam =  Input::get('voornaam');
            $tussenvoegsel = Input::get('tussenvoegsel');
            $achternaam = Input::get('achternaam');
            $bedrijfsnaam = Input::get('bedrijfsnaam');
            $woonplaats = Input::get('woonplaats');
            $straatnaam = Input::get('straatnaam');
            $huisnummer = Input::get('huisnummer');
            $postcode = Input::get('postcode');
            $telefoonnummer = Input::get('telefoonnummer');
            $checkfactuur = Input::get('checkfactuur');
            $factuurwoonplaats = Input::get('factuurwoonplaats');
            $factuurstraatnaam = Input::get('factuurstraatnaam');
            $factuurpostcode = Input::get('factuurpostcode');
            $factuurhuisnummer = Input::get('factuurhuisnummer');
            $email = Input::get('email');
            $password = Input::get('password');

            // check if factuuradress equals normal adress
            if($checkfactuur == false)
            {
                $factuurwoonplaats = $woonplaats;
                $factuurstraatnaam = $straatnaam;
                $factuurpostcode = $postcode;
                $factuurhuisnummer = $huisnummer;
            }

            // create our user
            $userdata = array(
                'titel' => $titel,
                'voornaam' => $voornaam,
                'tussenvoegsel' => $tussenvoegsel,
                'achternaam' => $achternaam,
                'bedrijfsnaam' => $bedrijfsnaam,
                'woonplaats' => $woonplaats,
                'straatnaam' => $straatnaam,
                'huisnummer' => $huisnummer,
                'postcode' => $postcode,
                'telefoonnummer' => $telefoonnummer,
                'factuurwoonplaats' => $factuurwoonplaats,
                'factuurstraatnaam' => $factuurstraatnaam,
                'factuurpostcode' => $factuurpostcode,
                'factuurhuisnummer' => $factuurhuisnummer,
                'email' => $email,
                'password' => $password
            );

            // add user to user table
            App\User::create(['name' => $userdata['voornaam'],
                'email' => $userdata['email'],
                'password' => Hash::make($userdata['password']),
            ]);

            // !!!!!! get latest added user ID !!!!!!
            $user_id = DB::getPdo()->lastInsertId();

            // Create user info
            App\Users_Info::create([
                'user_id' => $user_id,
                'titel' => $titel,
                'voornaam' => $voornaam,
                'tussenvoegsel' => $tussenvoegsel,
                'achternaam' => $achternaam,
                'bedrijfsnaam' => $bedrijfsnaam,
                'woonplaats' => $woonplaats,
                'straatnaam' => $straatnaam,
                'huisnummer' => $huisnummer,
                'postcode' => $postcode,
                'telefoonnummer' => $telefoonnummer,
                'factuurwoonplaats' => $factuurwoonplaats,
                'factuurstraatnaam' => $factuurstraatnaam,
                'factuurpostcode' => $factuurpostcode,
                'factuurhuisnummer' => $factuurhuisnummer
            ]);

            // Redirect to correct page...
            return Redirect::to('bestelkeuze');


        }
    }

    public function confirmFactuur()
    {
        App::setLocale('nl');

        // validate the info, create rules for the inputs
        $rules = array(
            'titel' => 'required|min:4|string',
            'voornaam' => 'required|min:1|max:50|string',
            'tussenvoegsel' => 'min:2|max:10|string',
            'achternaam' => 'required|min:2|max:50|string',
            'bedrijfsnaam' => 'min:2|max:100|string',
            'woonplaats' => 'required|min:2|max:100|string',
            'straatnaam' => 'required|min:2|max:100|string',
            'huisnummer' => 'required|min:1|max:16|string',
            'postcode' => 'required|min:6|max:7|string',
            'telefoonnummer' => 'required|min:8|max:16|string'
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('bestellen-factuur')
                ->withErrors($validator)// send back all errors to the login form
                ->withInput(Input::all()); // send back the input so that we can repopulate the form
        } else {

            // get submitted user data ...
            $user_factuur_array = array(
                'titel' => Input::get('titel'),
                'voornaam' => Input::get('voornaam'),
                'tussenvoegsel' => Input::get('tussenvoegsel'),
                'achternaam' =>  Input::get('achternaam'),
                'bedrijfsnaam' => Input::get('bedrijfsnaam'),
                'telefoonnummer' => Input::get('telefoonnummer'),
                'factuurstraatnaam' => Input::get('straatnaam'),
                'factuurwoonplaats' => Input::get('woonplaats'),
                'factuurhuisnummer' => Input::get('huisnummer'),
                'factuurpostcode' => Input::get('postcode')
            );

            Session::put('user_factuur_info', $user_factuur_array);

            $cookie = Cookie::forever('factuur', $user_factuur_array);

            // Redirect to correct page...
            return Redirect::to('bestelkeuze')->withCookie($cookie);
        }
    }

}
