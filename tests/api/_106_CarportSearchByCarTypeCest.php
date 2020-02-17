<?php 

class _106_CarportSearchByCarTypeCest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function CarportChargeHistory(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('check possible data in the API record corresponding');
        $api = "/Carport/SearchByCarType?key=";
        $data = $I->sendGET($api);
        $I->DisplayResponse($data);
        $I->dontSeeResponseCodeIs(401);
        $I->wantTo('Check for Carport Search with Key');
        $I->seeResponseJsonMatchesJsonPath('$.data[0].CAR_TYPE_NAME');
        $I->dontSeeResponseContainsJson(['data' => 'invalid page']);
        $I->dontSeeResponseContainsJson(['data' => 'invalid size']);
        $I->dontSeeResponseContainsJson(['code' => 401]);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
