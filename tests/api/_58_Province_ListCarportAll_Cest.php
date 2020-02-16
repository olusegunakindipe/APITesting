<?php 

class _58_Province_ListCarportAll_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function ProvinceListCarport(ApiTester $I) 
    {
        $I->AdminLogin();
        $I->wantTo('Get to the data in the List');
        $data = $I->sendGET('Province/ListByCarportAll');
        $I->wantTo('Check the correctness of these data');
        // $I->GetProvinceList($data);
        $I->DisplayResponse($data);
        $I->grabResponse();
        // $I->CheckResponseTimeEquals($data);
        $I->dontSeeResponseContainsJson(['code' => 404]);
        $I->dontSeeResponseContainsJson(['data' => null]);
        $I->seeResponseJsonMatchesJsonPath('$.data[0].DISTRICT_CODE');
        $I->seeResponseJsonMatchesJsonPath('$.data[0].DISTRICT_NAME');
        $I->seeResponseIsJson();
        $I->DontSeeResponseCodeIs(401);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
    }
}
