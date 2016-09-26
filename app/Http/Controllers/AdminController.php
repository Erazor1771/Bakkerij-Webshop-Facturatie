<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Http\Controllers\WebshopController;
use App\Http\Requests;
use App;
use Auth;
use Hash;
use App\Admin;
use Route;
use View;


class AdminController extends Controller
{

    private $data;

    public function __construct()
    {
        $this->data = '';
    }

    public function login(Request $request)
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
            return Redirect::to('admin/loginscreen')
                ->withErrors($validator)// send back all errors to the login form
                ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {

            // create our user data for the authentication
            $userdata = array(
                'email' => Input::get('email'),
                'password' => Input::get('password')
            );

            // attempt to do the login for an admin user
            $admin_user = Admin::where('email', '=', Input::get('email'))->first();

            if ($admin_user !== null) {

                if (Hash::check($userdata['password'],$admin_user['password'])) {

                    $request->session()->push('admin.email', $userdata['email']);
                    $request->session()->push('admin.check', true);

                    return Redirect::to('admin/dashboard');

                    // validation successful!
                    // echo Auth::user()->email;

                } else {
                    $errors = new MessageBag(['email' => ['Wachtwoord incorect...']]);

                    // validation not successful, send back to form
                    return Redirect::to('admin/loginscreen')
                        ->withErrors($errors)// send back all errors to the login form
                        ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form;
                }
            } else {

                $errors = new MessageBag(['password' => ['Email incorrect...']]);

                // validation not successful, send back to form
                return Redirect::to('admin/loginscreen')
                    ->withErrors($errors)// send back all errors to the login form
                    ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form;
            }

        }
    }

    public function checkAdminRights(Request $request)
    {
        if ($request->session()->has('admin')) {
            $view = $this->loadPage();
            return View::make($view)->with('data', $this->data);
        } else {
            return Redirect::to('admin/loginscreen');
        }
    }

    /**
     * All actions required to load a page succesfully:
     * 1. Load the view by using @function resolvePath
     *
     * @return View with all previously used functions
     */
    public function loadPage()
    {
        $uri = Route::getFacadeRoot()->current()->uri();
        $view = $this->resolvePath($uri);

        return $view;
    }

    /**
     * All actions required to load a page with a required path
     * If the current path does not exist it will return the 404 page
     *
     * @param $currentPath : relative path link to page it's currently on
     * @return the corresponding view to the corresponding path
     */
    public function resolvePath($currentPath)
    {

        if($currentPath == "admin/dashboard"){
            $view = 'admin.dashboard';
        } else if($currentPath == "admin/nieuws-overzicht"){
            $view = 'admin.nieuws.overzicht';
        } else if($currentPath == "admin/nieuws/toevoegen"){
            $view = 'admin.nieuws.toevoegen';
        } else if($currentPath == "admin/pagina-overzicht"){
            $view = 'admin.pagina.overzicht';
        } else if($currentPath == "admin/pagina/toevoegen"){
            $view = 'admin.pagina.toevoegen';
        } else if($currentPath == "admin/product-overzicht"){
            $view = 'admin.product.overzicht';
            $this->data = WebshopController::loadProductsTable();
        } else if($currentPath == "admin/fotoboek-overzicht"){
            $view = 'admin.fotoboek.overzicht';
        } else if($currentPath == "admin/fotoboek/toevoegen"){
            $view = 'admin.fotoboek.toevoegen';
        } else if($currentPath == "admin/product/edit/{id}") {
            //$view = 'admin.product.edit';
        } else {
            $view = '404';
        }

        return $view;
    }

}
