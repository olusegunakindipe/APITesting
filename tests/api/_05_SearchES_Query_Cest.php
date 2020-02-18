<?php 

class _05_SearchES_Query_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    Public function SearchES(ApiTester $I) {

        $I->AdminLogin();
        $I->wantTo('Get the Search Query data');
        $name= "name";
        $type = "flatComplex";
        $role = 'hq';
        $path = sprintf('/SearchES/Query?name=%s&type=%s&role=%s&role_id=%d', $name, $type, $role, null);
        $data = $I->sendGET($path);
        $I->DisplayResponse($data); //This is response Time
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->dontSeeResponseCodeIs(401);
        $I->DisplayResponse($data);
        $I->dontSeeResponseContainsJson(['data' => null]);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
