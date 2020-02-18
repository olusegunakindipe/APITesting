<?php 

class _07_Statistics_Info_Hq_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }
    public function StatisticsInfo(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Get the Matching fields in the List');
        $data = $I->sendGET('/Statistics/Info/hq/top');
        $I->DisplayResponse($data);
        $I->wantTo('see if data is the List');
        // $I->CheckInfoList($data);
        $I->grabResponse();
        // $I->CheckResponseTimeEquals($data);
        $I->seeResponseJsonMatchesJsonPath('$.data');
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        // just test data, no other field
    }
}
