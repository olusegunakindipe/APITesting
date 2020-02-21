<?php 

class _24_Pile_List_ByAll_Cest
{
    public function _before(ApiTester $I)
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
        // $I->CheckResponseTimeEquals($data);
        $I->seeResponseJsonMatchesJsonPath('$.data.data.[0].CHARGING_PILE_SN');
        $I->seeResponseJsonMatchesJsonPath('$.data.data.[0].CHARGING_PILE_SN');
        $I->seeResponseJsonMatchesJsonPath('$.data.data.[0].CHARGING_PILE_SN');
        $I->seeResponseJsonMatchesJsonPath('$.data.data.[0].CHARGING_PILE_SN');
        $I->seeResponseJsonMatchesJsonPath('$.data.pageInfo.pageTotal');
        $I->dontSeeResponseCodeIs(401);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
    }

}
