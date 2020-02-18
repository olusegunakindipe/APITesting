<?php 

class _29_Alert_ListByRealAlert_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function InfoListBy(ApiTester $I) 
    {
        $I->AdminLogin();
        $I->wantTo('Get the the Matching fields in the List');
        $page = 1;
        $size = 20;
        $urlParams = [
            $page,
            $size
        ];
        $api = "/Alert/ListByRealAlert/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->DisplayResponse($data);
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        // $I->checkInfoListData($data);
        $I->seeResponseJsonMatchesJsonPath('$.data...ALERT_TIME');
        $I->seeResponseJsonMatchesJsonPath('$.data...DEVICE_SN');
        $I->seeResponseJsonMatchesJsonPath('$.data...CELL_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data...SITE_ID');
        $I->seeResponseIsJson();
        $I->dontSeeResponseCodeIs(401);
        $I->seeResponseCodeIs(200); 
    }
}
