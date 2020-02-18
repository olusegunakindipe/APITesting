<?php 

class _64_Agent_ListBy_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function AgentListBy(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the some data are present in the API');
        $page = 1;
        $size = 20;
        $urlParams = [
            $page,
            $size
        ];
        $api = "/Agent/ListBy/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->wantTo('check Agent list data');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].AGENT_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].AGENT_TYPE');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].AGENT_ACCOUNT');
        // $I->checkAgentData($data);
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->seeResponseIsJson(); 
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
