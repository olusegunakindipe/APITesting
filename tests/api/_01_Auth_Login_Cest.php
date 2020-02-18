<?php 

class _01_Auth_Login_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    // What is this function doing for? Why still here? by ira
    public function tryToTest(ApiTester $I)
    {
    }

    public function Login(ApiTester $I)
    {
        // Here store password in file  by ira
        $I->Login('admindev', '123456');
        $I->seeResponseIsJson();

        // Just check json and response is enough to promise test api is work fine? by ira
        $I->seeResponseCodeIs(200); 
    }
}
