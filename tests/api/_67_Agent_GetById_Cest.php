<?php 

class _67_Agent_GetById_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function AgentGetById(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('check possible data in the API record corresponding');
        $data=$I->sendGET('Agent/GetById/262');
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->DisplayResponse($data);
        $I->dontSeeResponseCodeIs(401);
        $I->wantTo('check if data return json');
        $I->seeResponseIsJson();
        $I->seeResponseJsonMatchesJsonPath('$.data.RELATION_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data.AGENT_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data.AGENT_ACCOUNT');
        // $I->getAgentId($data);
        $I->dontSeeResponseContainsJson(['code' => 401]);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
    }
}
