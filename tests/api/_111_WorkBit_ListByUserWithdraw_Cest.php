<?php 

class _111_WorkBit_ListByUserWithdraw_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }
    public function ListByUserWithdraw(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Get the response Time of ToolMenuApi');
        $I->haveHttpHeader('accept', 'application/json');
        $I->haveHttpHeader('Content-Type','application/json');
        $I->sendGET('/WorkBit/ListByUserWithdraw/1/20/');
        $data = $I->grabDataFromResponseByJsonPath('debug');
        $I->DisplayResponse($data); //This is response Time
        $I->seeResponseContainsJson(array('time' => $data[0]['time']));
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].USED_MONEY');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].WITHDRAW_NO');
        $I->seeResponseIsJson();
        $I->dontSeeResponseContainsJson(['code' => 401]);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
    }
}
