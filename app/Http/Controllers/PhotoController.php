<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Photos;
use View;

class PhotoController extends Controller
{

    public function loadPhotos()
    {
        $photos = Photos::all();
        return View::make('fotoboek')->with('photos', $photos);
    }

}
