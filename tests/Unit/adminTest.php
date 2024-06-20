<?php

namespace Tests\Unit;

Use Tests\TestCase;

class AdminAddCompanyTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_add_Company()
    {
        $companyData = [
            'name' => 'AAAA',
            'email' => 'AAA@gmail.com',
            'password' => 'AAA456',
            'confirmpassword' => 'AAA456',
        ];
        $this ->post(route('addCompany.action'), $companyData)->assertSessionDoesntHaveErrors();
    }

}
