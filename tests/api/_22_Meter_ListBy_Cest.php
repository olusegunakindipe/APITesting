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
    public function MeterList(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('check if response corresponds');
        $page = 1;
        $size = 20;
        $urlParams = [
            $page,
            $size
        ];
        $api = "/Meter/ListBy/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->wantTo('Check response Time for this Api');
        $I->DisplayResponse($data);
        $I->wantTo('Check for response data');
        // $I->CheckDataPageNumbers($data);
        $I->dontSeeResponseCodeIs(401);      
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
    }
}
