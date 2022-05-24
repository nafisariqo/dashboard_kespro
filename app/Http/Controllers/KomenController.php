<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KomenController extends Controller
{
    public function index () {
        return view('komen.index');
    }
}
