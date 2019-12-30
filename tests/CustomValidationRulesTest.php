<?php

use Illuminate\Validation\Validator;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CustomValidationRulesTest extends TestCase
{

    public function testCheckTxt()
    {
        $rules = [
            'txt_check' => 'required|max:255'
        ];

        $data = [
            'txt_check' => "test"
        ];

        $v = $this->app['validator']->make($data, $rules);
        $this->assertTrue($v->passes());
    }
}
