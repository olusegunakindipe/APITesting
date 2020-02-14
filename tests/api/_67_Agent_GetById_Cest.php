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
        $I->seeResponseIsJson();
        $I->SeeResponseContainsJson([
            'ID' => '262',
            'RELATION_ID' => null,
            'AGENT_ID' => '522627198910080410',
            'AGENT_ACCOUNT' => 'agent_522627198910080410',
            'AGENT_TYPE' => '2',
            'AGENT_CLASS' => '1',
            'STATUS' => '0'
        ]);
        $I->SeeResponseContainsJson(['code' => 200]);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
    }
}
