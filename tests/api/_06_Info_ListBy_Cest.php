<?php 

class _06_Info_ListBy_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }
    public function InfoListBy(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('See if response contains Json');
        $startDate = '2020-01-07';
        $endDate = '2020-02-07';
        $page = 1;
        $limit = 20;
        $urlParams = [
            
            $startDate,
            $endDate,
            $page,
            $limit
        ];
        $api = "/Info/ListBy/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->DisplayResponse($data); //This is response Time
        $I->wantTo('see if response contains json');
        $I->seeResponseIsJson();
        $I->grabResponse();
        // $I->CheckNumber($data);
        $I->dontSeeResponseCodeIs(401);
        $I->seeResponseContains('data');
        // $I->CheckResponseTimeEquals($data);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
    }
}
