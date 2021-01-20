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
            'full_name' => 'required|string|regex:/^([^0-9]*)$/',
            'email_address' => 'required|email',
            'image_file' => 'nullable',
        ]);

        $firstName = explode(' ', $request['full_name'])[0];
        return view('success', ['name' => $firstName]);
    }
}
