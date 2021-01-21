<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * @var (string|int)[]
     */
    private $profileDimensions = ['width' => 500, 'height' => 500];

    /**
     * @param Request $request
     * @return string
     */
    function storeImageAndGetPath(Request $request)
    {
        if ($request->hasFile('image_file')) {
            $image = Image::make($request->file('image_file'));
            $originalDestination = $this->createDirectory(storage_path('uploads/'));
            $path = $originalDestination . 'profile_' . time() . '.' . $request->file('image_file')->getClientOriginalExtension();
            $image->save($path);
            return $path;
        }
        return "";
    }

    /**
     * @param Request $request
     * @param string $directory
     * @param int $width
     * @param int $height
     * @return string
     */
    function storeResizedImageAndGetPath(Request $request, string $directory = 'profile', int $width = 0, int $height = 0)
    {
        if (!$request->hasFile('image_file')) {
            return "";
        }

        $image = Image::make($request->file('image_file'));

        if ($width > 0 && $height > 0) {
            $image->fit($width, $height);
        } else {
            $image->fit($this->profileDimensions['width'], $this->profileDimensions['height']);
        }

        $destination = $this->createDirectory(public_path("{$directory}/"));
        $path = $destination . 'profile_' . time() . '.' . $request->file('image_file')->getClientOriginalExtension();
        $image->save($path);
        return $path;
    }

    /**
     * @param string $directory
     * @return string
     */
    function createDirectory(string $directory)
    {
        if (!File::exists($directory)) {
            File::makeDirectory($directory);
        }
        return $directory;
    }
}
