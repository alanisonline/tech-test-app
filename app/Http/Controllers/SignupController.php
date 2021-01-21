<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Signup;
use App\Http\Controllers\ImageController;

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
            'email_address' => 'required|email|unique:signups,email_address',
            'image_file' => 'nullable|max:1999',
        ]);

        $signup = new Signup;
        $signup->full_name = $request->input('full_name');
        $signup->email_address = $request->input('email_address');
        $imageController = new ImageController();
        $signup->original_image = $imageController->storeImageAndGetPath($request);
        $signup->profile_image = $imageController->storeResizedImageAndGetPath($request);

        $signup->save();

        return view('success', ['name' => $this->getFirstNameFromFullName($request['full_name'])]);
    }


    /**
     * @param string $full_name
     * @return string
     */
    function getFirstNameFromFullName(string $full_name)
    {
        return explode(' ', $full_name)[0];
    }
}
