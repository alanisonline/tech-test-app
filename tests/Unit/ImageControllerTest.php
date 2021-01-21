<?php

namespace Tests\Unit;

use Illuminate\Http\Request;
use App\Http\Controllers\ImageController;
use PHPUnit\Framework\TestCase;

class ImageControllerTest extends TestCase
{
    /**
     * @return void
     */
    public function test_check_empty_string_is_returned_if_request_object_has_no_file()
    {
        $imageController = new ImageController;
        $request = new Request;
        $this->assertEquals('', $imageController->storeImageAndGetPath($request));
    }

    /**
     * @return void
     */
    public function test_check_empty_string_is_returned_if_request_object_has_no_file_to_resize()
    {
        $imageController = new ImageController;
        $request = new Request;
        $this->assertEquals('', $imageController->storeResizedImageAndGetPath($request));
    }
}
