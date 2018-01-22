<?php

namespace App\Http\Controllers;

use App\Services\Example;

class ExampleController extends Controller
{
    public function getUser() {
        $data = (new Example)->getUsersData();
        
        return view('welcome', $data);
    }
}
