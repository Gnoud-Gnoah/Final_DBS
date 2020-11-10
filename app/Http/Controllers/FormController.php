<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index(Request $reques){
        $re = $reques->input('hoten');
        echo $re;
        return view('input');
    }
}
