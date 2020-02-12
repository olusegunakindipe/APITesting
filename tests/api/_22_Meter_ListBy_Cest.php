<?php 

class _22_Meter_ListBy_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }
    public function MeterList(ApiTester $I){
        $I->AdminLogin();
        $I->wantTo('check if response corresponds');
        $data = $I->sendGET('Meter/ListBy/1/20');
        $I->wantTo('Check response Time for this Api');
        $I->DisplayResponse($data);
         $I->wantTo('Check if response Time and Peak Time are contained in this Api');
         
         $I->wantTo('Check for Data and also the page numbers');
         $I->CheckDataPageNumbers($data);
        //  $I->CheckResponseTimeEquals();
        
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
        
}
}
