<?php 

class _100_SystemListByProjectCode_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }
    public function SystemListByProjectCode(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Get if data is presence');
        $I->haveHttpHeader('accept', 'application/json');
        $I->haveHttpHeader('Content-Type','application/json');
        $I->sendPOST('/System/ListByProjectCode');
        $data = $I->grabDataFromResponseByJsonPath('debug');
        $I->DisplayResponse($data);
        $I->seeResponseContainsJson(array('time' => $data[0]['time']));
        $I->dontSeeResponseContainsJson(['code' => 401]);
        $I->seeResponseJsonMatchesJsonPath('$.data[0].NAME');
        $I->seeResponseJsonMatchesJsonPath('$.data[0].URL_PREFIX');
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
    }
}
