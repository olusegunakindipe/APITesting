<?php 

class _64_Agent_ListBy_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }
    public function AgentListBy(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the some data are present in the API');
        $data = $I->sendGET('/Agent/ListBy/1/20');
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->wantTo('check if the data is empty');
        $I->seeResponseContainsJson([
            "ID" => "264",
            "AGENT_ID" => "110101199003074274", 
            "AGENT_ACCOUNT" => "agent_testprivilege",
            "AGENT_TYPE" => "1",
            "AGENT_CLASS" => "1",
            "ADD_CHILDREN_INFO" => "0"
        ]);
        $I->dontSeeResponseCodeIs(401);
        $I->seeResponseIsJson(); 
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
