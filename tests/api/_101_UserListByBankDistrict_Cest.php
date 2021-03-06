<?php 

class _101_UserListByBankDistrict_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function UserListByBankDistrict(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Get the response Time of ToolMenuApi');
        $I->haveHttpHeader('accept', 'application/json');
        $I->haveHttpHeader('Content-Type','application/json');
        $I->sendPOST('/User/ListByBankDistrict/?key=',
            [
                "province" => "天津",
                "city" => "天津市"
            ]
        );
        $data = $I->grabDataFromResponseByJsonPath('debug');
        $I->DisplayResponse($data); //This is response Time
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->seeResponseJsonMatchesJsonPath('$.data.BANK[0].BANK_NAME');
        $I->seeResponseJsonMatchesJsonPath('$.data.BANK[0].BANK_SORT');
        $I->dontSeeResponseContainsJson(['data' => null]);
        $I->dontSeeResponseContainsJson(['code' => 401]);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 

    }
}

