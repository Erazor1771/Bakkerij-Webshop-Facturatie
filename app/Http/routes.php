<?php

/**
 * Regular Webpages
 */

Route::get('/', 'NewsController@getLatestNews');
Route::get('over-ons', function () { return view('over_ons'); });
Route::get('/fotoboek', 'PhotoController@loadPhotos');
Route::get('openingstijden', function () { return view('openingstijden'); });
Route::get('uitleg', function () { return view('uitleg'); });
Route::get('biologisch-brood', function () { return view('brood'); });
Route::get('tips', function () { return view('tips'); });


/**
 * Regular Post Requests
 */

/**
 * Order Steps
 */

Route::get('mijn-lijst', function () { return view('mijn_lijst'); });




Route::get('/setpaths', 'WebshopController@setPaths');
Route::get('/news/{id}/{heading}', 'NewsController@getNewsItem');



Route::get('nieuws', function () {
    return view('nieuws');
});
Route::get('single-item', function () {
    return view('single_item');
});
Route::get('eerder-gekocht', function () {
    return view('eerder_gekocht');
});
Route::get('inloggen', function () {
    return view('inloggen');
});
Route::get('webshop', 'CategoriesController@getAllCategories');

Route::get('bestellen', function () {
    return view('bestellen');
});
Route::get('api/webshop/{category}', 'WebshopController@get');


// API ROUTES ==================================
Route::group(array('prefix' => 'api'), function() {

    // since we will be using this just for CRUD, we won't need create and edit
    // Angular will handle both of those forms
    // this ensures that a user can't access api/create or api/edit when there's nothing there
    Route::resource('webshop', 'WebshopController');


});



    /*
    |--------------------------------------------------------------------------
    | Application Routes
    |--------------------------------------------------------------------------
    |
    | This route group applies the "web" middleware group to every route
    | it contains. The "web" middleware group is defined in your HTTP
    | kernel and includes session state, CSRF protection, and more.
    |
    */

Route::group(['middleware' => ['web']], function () {

    Route::get('test', function () { return view('emails.order_bevestiging_mail'); });
    Route::get('test2', function () { return view('emails.order_bevestiging_admin_mail'); });

    /**
     * Regular Webpages
     */

    Route::get('contact', function () { return view('contact'); });

    /**
     * Regular Post Requests
     */

    Route::post('/contact/sendContactForm', 'FormController@sendContactForm');

    Route::post('betalen', 'TijdschemaController@paymentPath');

    Route::get('login', 'UserController@checkLogin');

    Route::get('registreren', function () {
        return view('register');
    });
    Route::get('bestelkeuze', function () {
        return view('bestelkeuze');
    });
    Route::get('bestellen-factuur', function () {
        return view('bestellen_factuur');
    });

    Route::post('auth/login', array('uses' => 'UserController@doLogin'));

    Route::post('auth/register', array('uses' => 'UserController@registerUser'));
    Route::post('auth/confirmFactuur', array('uses' => 'UserController@confirmFactuur'));

    Route::get('api/tijden/{location}/{type}/{today}', 'TijdschemaController@generateTijdschema');
    Route::get('api/getcustomerinfo/', 'TijdschemaController@getCustomerInfo');

    //Route::get('/public/omnikassa/order/handle', 'OrderController@handleOmnikassa');
    Route::get('/omnikassa/order/handle', 'OrderController@handleOmnikassa');

    Route::get('order-bevestiging', 'OrderController@getOrder');
    Route::get('order-bevestiging-ideal', 'OrderController@getOrderIdeal');


    // REGULAR ADMIN PAGE ROUTES
        Route::get('/admin/dashboard', 'AdminController@checkAdminRights');
        Route::get('/admin/nieuws/toevoegen', 'AdminController@checkAdminRights');
        Route::get('/admin/pagina-overzicht', 'AdminController@checkAdminRights');
        Route::get('/admin/pagina/toevoegen', 'AdminController@checkAdminRights');
        Route::get('/admin/fotoboek-overzicht', 'AdminController@checkAdminRights');
        Route::get('/admin/fotoboek/toevoegen', 'AdminController@checkAdminRights');
    // END REGULAR ADMIN PAGE ROUTES

    // LOGIN ADMIN
        Route::get('/admin/loginscreen', function () { return view('admin.login'); });
        Route::post('/admin/loginscreen/login', 'AdminController@login');
    // END LOGIN ADMIN

    // PRODUCTS ADMIN
        Route::get('/admin/product-overzicht', 'WebshopController@getProductTablePage');
        Route::get('/admin/product/toevoegen', 'WebshopController@addProductView');
        Route::get('/admin/product/edit/{id}', 'WebshopController@editProduct');
        Route::get('/admin/api/products', 'WebshopController@loadProductsTable');

        Route::post('/admin/product/add', 'WebshopController@addProduct');
        Route::post('/admin/product/edit/{id}/update', 'WebshopController@updateProduct');
        Route::post('/admin/product/delete/{id}', 'WebshopController@deleteProduct');
        Route::post('/admin/product/search/{name}', 'WebshopController@searchProducts');
    // END PRODUCTS ADMIN

    // NEWS ADMIN
        Route::get('/admin/nieuws-overzicht', 'NewsController@getNewsTablePage');
        Route::get('admin/api/news', 'NewsController@loadNewsTable');
        Route::get('/admin/news/toevoegen', 'NewsController@addNewsView');

        Route::post('/admin/news/add', 'NewsController@addNewsItem');
    // END NEWS ADMIN


});

