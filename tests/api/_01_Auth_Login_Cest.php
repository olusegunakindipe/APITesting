<?php 

class _01_Auth_Login_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function Login(ApiTester $I)
    {
        // Here store password in file  by ira
        $pass = "password.txt";
        $password = file_get_contents($pass);
        $data = $I->Login('admindev', $password);
        $I->seeResponseIsJson();
        // Just check json and response is enough to promise test api is work fine? by ira
        $I->seeResponseJsonMatchesJsonPath('$.data.name');
        $I->seeResponseJsonMatchesJsonPath('$.data.role');
        $I->seeResponseJsonMatchesJsonPath('$.data.account');
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I-> seeResponseMatchesJsonType(['data' =>
            [
                'name' => 'string',
                'role' => 'string',
                'account' => 'string',
                'reset_pwd' => 'integer'
            ]
        ]);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200); 
    }
}
