<?php 

class _70_Contract_ListBy_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function ContractList(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('check possible data in the API record corresponding');
        $data=$I->sendGET('/Contract/ListBy/1/20');
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->DisplayResponse($data);
        $I->dontSeeResponseCodeIs(401);
        $I->seeResponseIsJson();
        $I->SeeResponseContainsJson(['data' => 
            [
                'id' => '945',
                'AGENT_ID'=> '530121198709185389',
                'SIGNING_TIME' => '2020-02-17',
                'STOPSIGNING_TIME' => '2020-02-29',
                'INVESTMENT_CONTRACT' => '0',
                'CONTRACT_REVIEW_FORM' => '1',
                'CONSTRUCTION_CONTRACT' =>'2'

            ]
        ]);
        $I->SeeResponseContainsJson([ 'total'=> 800, 'pageTotal'=>40]);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
    }
}
