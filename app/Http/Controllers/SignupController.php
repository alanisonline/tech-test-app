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
            'email_address' => 'required|email|unique:signups,email',
            'image_file' => 'nullable',
        ]);

        $signup = new Signup;
        $signup->full_name = $request->input('full_name');
        $signup->email = $request->input('email_address');

        $image = empty($request->input('image_file')) ? '' : $request->input('image_file');
        $signup->original_image = $image;
        $signup->profile_image = $image;

        $signup->save();

        $firstName = explode(' ', $request['full_name'])[0];
        return view('success', ['name' => $firstName]);
    }
}
