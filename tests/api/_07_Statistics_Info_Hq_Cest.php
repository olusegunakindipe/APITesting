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
    public function InfoListBy(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Get the Matching fields in the List');
        $data = $I->sendGET('Info/ListBy/2019-02-07/2020-02-07/1/10');
        $I->DisplayResponse($data);
        $I->dontSeeResponseContainsJson(['code' => 401]);
        $I->wantTo('see if the totalcount  Matches fields in the List');
        $I->CheckNumber($data);
        // $data = $I->grabDataFromResponseByJsonPath('debug');
        $I->grabResponse();
        $I->CheckResponseTimeEquals($data);
        // $I->CheckId();
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
    }
}
