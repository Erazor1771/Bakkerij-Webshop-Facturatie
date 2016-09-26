<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

use App\Http\Requests;
use Validator;
use App;

class FormController extends Controller
{
    public function sendContactForm(Request $request)
    {
        $all_input = $request->all();
        $errors = $this->validateContactForm($all_input);

        if(!count($errors) > 0){
            $this->sendContactFormEmail($all_input['naam'],$all_input['email'],$all_input['onderwerp'],$all_input['bericht']);
            return Redirect::to('contact#contact')->with('data', ['succes']);
        } else{
            return Redirect::to('contact#contact')
                ->withInput()
                ->withErrors($errors);
        }
    }

    public function validateContactForm($input_array)
    {
        App::setLocale('NL');

        $validator = Validator::make($input_array, [
            'naam' => 'required|max:125',
            'onderwerp' => 'required|max:255',
            'email' => 'required|email|max:125',
            'bericht' => 'required|max:2000',
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        } else {
            return null;
        }
    }

    public function sendContactFormEmail($naam, $email, $onderwerp, $bericht)
    {
        // Email To Customer
        include_once(public_path() . '/emails/contactToCustomerMail.php');

        // Email to Shop Owner
        include_once(public_path() . '/emails/contactToShopOwnerMail.php');
    }

}
