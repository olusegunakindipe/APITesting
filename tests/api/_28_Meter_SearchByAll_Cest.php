<?php 

class _28_Meter_SearchByAll_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function MeterSearchByAll(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the data are correctly stored');
        $data = $I->sendGET('Meter/SearchByAll');
        $I->DisplayResponse($data);
        $I->wantTo('Check if the specific elctricity number is included in the list');
        $I->CheckForElectricityNo($data);
        $I->CheckResponseTimeEquals($data);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200); 
    }
}
