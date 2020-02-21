<?php 

class _10_Province_ListAll_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests

    public function ProvinceList(ApiTester $I) 
    {
        $I->AdminLogin();
        $I->wantTo('Get to the data in the List');
        $I->haveHttpHeader('accept', 'application/json');
        $I->haveHttpHeader('Content-Type', 'application/json');
        $data = $I->sendGET('Province/ListAll');        
        $I->DisplayResponse($data);
        $I->grabResponse();
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->seeResponseJsonMatchesJsonPath('$.data[0].DISTRICT_CODE');
        $I->seeResponseJsonMatchesJsonPath('$.data[0].DISTRICT_NAME');
        $I->seeResponseJsonMatchesJsonPath('$.data[0].GPS_LAT');
        $I->seeResponseJsonMatchesJsonPath('$.data[0].GPS_LNG');
        $I->seeResponseJsonMatchesJsonPath('$.data[0].PID');
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        // just test DISTRICT_CODE
    }
}
