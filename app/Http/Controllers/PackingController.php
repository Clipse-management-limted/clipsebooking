<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PackingController extends Controller
{
  public function index()
  {
    return view('pages.packings.packing');
  }
}
