<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class secundarioController extends Controller
{
   public function __invoke()
   {
    return view('secundaria');
   }
}
