<?php

namespace Tests\Unit;

use App\Http\Controllers\SignupController;
use PHPUnit\Framework\TestCase;

class SignupControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    /**
     * @return void
     */
    public function test_get_first_part_of_string_if_string_has_spaces() {
        $signupController = new SignupController;
        $this->assertEquals('John', $signupController->getFirstNameFromFullName('John Wick'));
    }

    /**
     * @return void
     */
    public function test_get_string_back_if_there_are_no_spaces() {
        $signupController = new SignupController;
        $this->assertEquals('John', $signupController->getFirstNameFromFullName('John'));
    }
}
