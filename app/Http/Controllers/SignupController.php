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
            'image_file' => 'nullable|max:1999',
        ]);

        $signup = new Signup;
        $signup->full_name = $request->input('full_name');
        $signup->email = $request->input('email_address');

        $storedImageName = $this->storeImageAndRetrieveHashName($request);

        $signup->original_image = $storedImageName;
        $signup->profile_image = $storedImageName;

        $signup->save();

        return view('success', ['name' => $this->getFirstNameFromFullName($request['full_name'])]);
    }

    /**
     * @param Request $request
     * @return string
     */
    function storeImageAndRetrieveHashName(Request $request)
    {
        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file');
            $path->store('uploads');
            return $path->hashName();
        }

        return "";
    }

    /**
     * @param string $full_name
     * @return string
     */
    function getFirstNameFromFullName(string $full_name) {
        return explode(' ', $full_name)[0];
    }
}
