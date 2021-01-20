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

        $signup = new Signup;
        $signup->full_name = $request->input('full_name');
        $signup->email = $request->input('email_address');
        $signup->original_image = $request->input('image_file');
        $signup->profile_image = $request->input('image_file');
        $signup->save();

        $firstName = explode(' ', $request['full_name'])[0];
        return view('success', ['name' => $firstName]);
    }
}
