<?php 

class _30_Alert_ListBy_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
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
        $I->dontSeeResponseCodeIs(401);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
