<?php 

class _30_Alert_ListBy_Cest
{
    public function _before(ApiTester $I)
    {
    }
    
    public function AlertListBy(ApiTester $I) 
    {
        $I->AdminLogin();
        $I->wantTo('Get the data Information');
        $startDate ="2020-01-07";
        $endDate = "2020-02-07";
        $page = 1;
        $size = 20;
        $urlParams = [
            $startDate,
            $endDate,
            $page,
            $size
        ];
        $api = "/Alert/ListBy/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->wantTo('check Info about the response Time');
        $I->DisplayResponse($data);
        // $I->AlertTime($data);
        $I->wantTo('check if response contains data');
        $I->seeResponseJsonMatchesJsonPath('$.data...ALERT_TIME');
        $I->seeResponseJsonMatchesJsonPath('$.data...CELL_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data...SITE_NAME');
        $I->seeResponseJsonMatchesJsonPath('$.data...DEVICE_TYPE');
        $I->seeResponseJsonMatchesJsonPath('$.data.pageInfo.pageTotal');
        $I->dontSeeResponseCodeIs(401);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
