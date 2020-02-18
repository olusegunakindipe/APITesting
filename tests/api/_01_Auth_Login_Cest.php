<?php 

class _01_Auth_Login_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests

    public function Login(ApiTester $I)
    {
        $I->Login('admindev', '123456');
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200); 
    }
}
