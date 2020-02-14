<?php 

class _85_WorkBit_ListByAgent_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function WorkBitAgent(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the some data are present in the API');
        $data = $I->sendGET('/WorkBit/ListByBisAgent/1/20');
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->dontSeeResponseMatchesJsonType([
            'data' => [
                 'ROWNUM' => 'integer',
                 'BIS_ID' => 'integer',
                 'NAME' => 'string|null',
                 'AGENT_BEAR' => 'integer',
                 'CREATE_TIME' => 'string',
                 'AGENT_FIELD_COST' => 'float'
             ]
         ]);
        $I->seeResponseContainsJson(['total' => 421, 'pageTotal'=>22]);
        $I->seeResponseIsJson(); 
        $I->seeResponseCodeIs(200); 
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
