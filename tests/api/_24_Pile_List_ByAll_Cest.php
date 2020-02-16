<?php 

class _24_Pile_List_ByAll_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }
    public function PileListByAll(ApiTester $I) 
    {
        $I->AdminLogin();
        $I->wantTo('Check for data correctness');
        $page = 1;
        $size = 20;
        $urlParams = [
            $page,
            $size
        ];
        $api = "/Pile/ListByAll/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->DisplayResponse($data);
        $I->seeResponseIsJson();
        // $I->CheckResponseTimeEquals($data);
        $I->seeResponseJsonMatchesJsonPath('$.data.data.[0].CHARGING_PILE_SN');
        $I->dontSeeResponseCodeIs(404);
        $I->seeResponseCodeIs(200);
    }

}
