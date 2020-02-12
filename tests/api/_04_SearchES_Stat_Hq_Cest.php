<?php 

class _04_SearchES_Stat_Hq_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }
    Public function SearchES(ApiTester $I) {

        $I->AdminLogin();
        $I->wantTo('Get the ID and Matching fields in SearchES');
        $I->haveHttpHeader('accept', 'application/json');
        $I->haveHttpHeader('Content-Type','application/json');
        $data = $I->sendGET('SearchES/Stat/hq/top/2020-01-07/2020-02-05');
        $I->CheckVariousData($data);
        $I->DisplayResponse($data); //This is response Time
    // $data = $I->grabDataFromResponseByJsonPath('debug');
         $I->grabResponse();
         $I->CheckResponseTimeEquals($data);
        // $I->CheckId();
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
    }
}
