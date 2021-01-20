<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Signup;

class SignupController extends Controller
{
    /**
     * @param Request $request
     * @return view
     */
    function store(Request $request)
    {
        $this->validate($request, [
            'full-name' => 'required',
            'email-address' => 'required',
            'image-file' => 'nullable',
        ]);

        $firstName = explode(' ', $request['full-name'])[0];
        return view('success', ['name' => $firstName]);
    }
}
