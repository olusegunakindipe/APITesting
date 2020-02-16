<?php 

class _23_Meter_SearchBy_Useless_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function SearchByUseless(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('test the values of fields in this api');
        $data = $I->sendGET('Meter/SearchByUseless');
        $I->grabResponse();
        $I->DisplayResponse($data);
        // $I->SearchByData($data);
        $I->seeResponseJsonMatchesJsonPath('$.data...ELECTRICITY_METER_SN');
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
        $I->dontSeeResponseCodeIs(404);
    }
}
