<?php 

class _102__User_ListByBankNo_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function UserListByBankNo(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Get the response Time of UserListByBankNo');
        $I->haveHttpHeader('accept', 'application/json');
        $I->haveHttpHeader('Content-Type','application/json');
        $I->sendPOST('/User/ListByBankNo/?key=',
            [
                "province" => "天津",
                "city" => "天津市",
                "bank" => "中国农业银行"       
            ]
        );
        $data = $I->grabDataFromResponseByJsonPath('debug');
        $I->DisplayResponse($data); //This is response Time
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->seeResponseJsonMatchesJsonPath('$.data[0].BANK_BRANCH');
        $I->seeResponseJsonMatchesJsonPath('$.data[0].LINE_NUMBER');
        $I->dontSeeResponseContainsJson(['data' => null]);
        $I->dontSeeResponseContainsJson(['code' => 404]);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 

    }
}
