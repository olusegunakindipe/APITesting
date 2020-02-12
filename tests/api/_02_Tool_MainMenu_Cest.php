<?php 

class _02_Tool_MainMenu_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

        Public function Tool_Menu(ApiTester $I) {
            $I->AdminLogin();
            $I->wantTo('Get the response Time of ToolMenuApi');
            $I->haveHttpHeader('accept', 'application/json');
            $I->haveHttpHeader('Content-Type','application/json');
            $data = $I->sendGET('Tool/MainMenu');
            // $data = $I->grabDataFromResponseByJsonPath('debug');
             $a = $I->grabResponse();
             $I->DisplayResponse($data); //This is response Time

            $I->seeResponseContainsJson(array('time' => $data[0]['time']));
             $I->CheckResponseTimeEquals();
            $I->seeResponseIsJson();
            $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
            
        }
            
    
}
