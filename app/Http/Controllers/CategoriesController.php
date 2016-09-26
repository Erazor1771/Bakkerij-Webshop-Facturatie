<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Categories;
use View;

class CategoriesController extends Controller
{

    public function getAllCategories()
    {
        $categories = Categories::where('type', 'hoofd')->get();
        $subcategories = Categories::where('type', 'sub')->get();
        $i = 0;
        $counter = count($categories);

        return View::make('webshop')->with(['categories' => $categories,
                                            'sub_categories' => $subcategories,
                                            'counter' => $counter,
                                            'i' => $i
                                           ]);
    }

}
