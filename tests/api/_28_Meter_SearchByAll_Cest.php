<?php 

class _28_Meter_SearchByAll_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function MeterSearchByAll(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the data are correctly stored');
        $data = $I->sendGET('Meter/SearchByAll');
        $I->DisplayResponse($data);
        $I->wantTo('Check if the specific elctricity number is included in the list');
        $I->seeResponseJsonMatchesJsonPath('$data[0].ELECTRICITY_METER_SN');
        $I->seeResponseJsonMatchesJsonPath('$data[0].ELECTRICITY_METER_NAME');
        $I->seeResponseJsonMatchesJsonPath('$debug.time');
        $I->seeResponseIsJson();
        $I->dontSeeResponseCodeIs(401);
        $I->seeResponseCodeIs(200); 
    }
}
