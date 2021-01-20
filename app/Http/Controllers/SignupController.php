<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignupController extends Controller
{
    /**
     * @param Request $request
     * @return view
     */
    function store(Request $request)
    {
        $firstName = explode(' ', $request['full-name'])[0];
        return view('success', ['name' => $firstName]);
    }
}
