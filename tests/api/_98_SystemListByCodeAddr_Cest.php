<?php 

class _98_SystemListByCodeAddr_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function SystemListByCodeAddr(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Get the response Time of ToolMenuApi');
        $I->haveHttpHeader('accept', 'application/json');
        $I->haveHttpHeader('Content-Type','application/json');
        $I->sendPOST('/System/ListByCodeAddr/');
        $data = $I->grabDataFromResponseByJsonPath('debug');
        $I->DisplayResponse($data); //This is response Time
        $I->seeResponseContainsJson(array('time' => $data[0]['time']));
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->dontSeeResponseContainsJson(['code' => 401]);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
    }
}
