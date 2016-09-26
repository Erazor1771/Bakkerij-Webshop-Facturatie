<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateClinicDescriptionFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Products;
use App\Categories;
use Response;
use View;
use DB;
use File;
use Redirect;


class WebshopController extends Controller
{
	/**
	 * Send back all comments as JSON
	 *
	 * @return Response
	 */
    public function index(){
		return Response::json(Products::get());
	}

	public function get($category)
	{
		$products = Products::where('categories','LIKE', '%' . $category .'%')->get();
		return Response::json($products);
	}

	public static function loadProductsTable()
	{
			$products = DB::table('products')->orderBy('created_at', 'desc')->paginate(10);
			return $products;
			//return $data;
	}

	public function getProductTablePage()
	{
		return View::make('admin.product.overzicht');
	}

	public function edit($id)
	{
		$row = Products::where('id', $id) ->first();
		return view('admin.product.edit')->with('row', $row);
	}

	public function addProduct(Request $request){
		$naam = Input::get('naam');
		$prijs = Input::get('prijs');
		$categories = Input::get('categories');
		$beschrijving = Input::get('beschrijving');
		if(Input::get('PostNL') != '') {
			$postNL = Input::get('PostNL');
		} else {
			$postNL = '';
		}
		$waarschuwing = Input::get('waarschuwing');
		$beschikbaarheid = Input::get('available');
		//$prijsaanbieding = Input::get('prijsaanbieding');
		$file = Input::get('file');

		$categorie_string = '';
		for($i = 0; $i < count($categories); $i++){
			if($i != (count($categories) - 1)){
				$categorie_string .= $categories[$i] . ', ';
			} else {
				$categorie_string .= $categories[$i];
			}
		}

		DB::insert('insert into products (categories, name, price, type, details, rating, availability, warning, path, postnl) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',
			array($categorie_string, $naam, $prijs,'standaard', $beschrijving, '1', $beschikbaarheid, $waarschuwing, "inventory_images/".$_FILES['file']['name'], $postNL));

		$imageName = time().'.'. $request->file->getClientOriginalExtension();
		$request->file->move(public_path('inventory_images'), $_FILES['file']['name']);

		// @ToDo : Resize images and check if file is not too large to upload

		$categories = Categories::where('type', 'hoofd')->get();
		$subcategories = Categories::where('type', 'sub')->get();

		return view('admin.product.toevoegen')->with(['categories' => $categories,
													  'subcategories' => $subcategories
													 ]);
	}

	public function editProduct(Request $request, $id){

		if ($request->session()->has('admin')) {
			$data = DB::table('products')->where('id', $id) ->first();
			$categories = Categories::where('type', 'hoofd')->get();
			$subcategories = Categories::where('type', 'sub')->get();
			$selected_categories = $data->categories;

			return view('admin.product.edit')->with(['data' => $data,
													 'categories' => $categories,
													 'subcategories' => $subcategories,
				                                     'selected_categories' => $selected_categories
													]);
		} else {
			return Redirect::to('admin/loginscreen');
		}

	}

	public function updateProduct($id, Request $request)
	{
		$naam = Input::get('naam');
		$prijs = Input::get('prijs');
		$categories = Input::get('categories');
		$beschrijving = Input::get('beschrijving');
		if(Input::get('PostNL') != '') {
			$postNL = Input::get('PostNL');
		} else {
			$postNL = '';
		}
		$waarschuwwing = Input::get('waarschuwing');
		$beschikbaarheid = Input::get('available');
		//$prijsaanbieding = Input::get('prijsaanbieding');
		$file = Input::get('file');

		$categorie_string = '';
		for($i = 0; $i < count($categories); $i++){
			if($i != (count($categories) - 1)){
				$categorie_string .= $categories[$i] . ', ';
			} else {
				$categorie_string .= $categories[$i];
			}
		}

		DB::table('products')->where('id', $id);

		if(Input::hasFile('file')) {

			$image = DB::table('products') ->where('id', $id) ->first();
			File::delete($image->path);

			DB::table('products')
				->where('id', $id)
				->update(['price' => $prijs,
						  'name' => $naam,
					      'categories' => $categorie_string,
					      'details' => $beschrijving,
					      'warning' => $waarschuwwing,
					      'path' => "inventory_images/".$_FILES['file']['name'],
					      'postnl' => $postNL,
					      'availability' => $beschikbaarheid,
						]);
			$request->file->move(public_path('inventory_images'), $_FILES['file']['name']);
		}else
		{
			DB::table('products')
				->where('id', $id)
				->update(['price' => $prijs,
						 'name' => $naam,
						 'categories' => $categorie_string,
						 'details' => $beschrijving,
						 'warning' => $waarschuwwing,
						 'postnl' => $postNL,
						 'availability' => $beschikbaarheid
						]);
		}

		$data = DB::table('products')->where('id', $id) ->first();
		return redirect()->back()->with('data', $data);
	}

	public function deleteProduct(Request $request, $id){

		$image = DB::table('products') ->where('id', $id) ->first();

		File::delete($image->path);
		DB::table('products')
			->where('id', $id)
			->delete();

		$getData = DB::table('products')->where('id', $id) ->first();

		return redirect()->back();
	}

	public function addProductView(Request $request)
	{

		if ($request->session()->has('admin')) {
			$categories = Categories::where('type', 'hoofd')->get();
			$subcategories = Categories::where('type', 'sub')->get();
			return View::make('admin.product.toevoegen')->with(['categories' => $categories,
																'subcategories' => $subcategories
															   ]);
		} else {
			return Redirect::to('admin/loginscreen');
		}


	}

	public function searchProducts($name)
	{
		$products = Products::where('name', 'LIKE', "%$name%")->orderBy('created_at', 'desc')->get();
		return $products;
	}

}
