<?php 

class _67_Agent_GetById_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function AgentGetById(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('check possible data in the API record corresponding');
        $I->wantTo('check if data is accurate');
        $id=262;
        $urlParams = [
            $id
        ];
        $api = "/Agent/GetById/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->DisplayResponse($data);
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
