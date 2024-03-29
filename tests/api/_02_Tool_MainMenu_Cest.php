<?php 

class _02_Tool_MainMenu_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function Tool_Menu(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Get the response Time of ToolMenuApi');
        $I->haveHttpHeader('accept', 'application/json');
        // No space found after comma in function call by ira
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendGET('Tool/MainMenu');
        $data = $I->grabDataFromResponseByJsonPath('debug');
        $I->DisplayResponse($data); //This is response Time
        $I->seeResponseContainsJson(array('time' => $data[0]['time']));
            // $I->CheckResponseTimeEquals($data);
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->seeResponseJsonMatchesJsonPath('$.data[0].name');
        $I->seeResponseJsonMatchesJsonPath('$.data[0].type');
        $I->seeResponseJsonMatchesJsonPath('$.data[0].methods');
        $I->seeResponseJsonMatchesJsonPath('$.data[0].subItem[0].id');
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
    }
}
