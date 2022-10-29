<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyNameController extends Controller
{
    public function printMyName(){
        return view('printMyName');
    }
}
