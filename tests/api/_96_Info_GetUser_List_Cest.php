<?php 

class _96_Info_GetUser_List_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function InfoGetUserList(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Get the response Time of ToolMenuApi');
        $I->haveHttpHeader('accept', 'application/json');
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendPOST('/Info/GetUserList/',
            [
                'role'=> ['hq'],
                'districtCode' => ''
            ]
        );
        $data = $I->grabDataFromResponseByJsonPath('debug');
        $I->DisplayResponse($data); //This is response Time
        $I->seeResponseContainsJson(array('time' => $data[0]['time']));
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->seeResponseJsonMatchesJsonPath('$.data...account');
        $I->seeResponseJsonMatchesJsonPath('$.data...name');
        $I->dontSeeResponseContainsJson(['code' => 401]);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
    }
}
