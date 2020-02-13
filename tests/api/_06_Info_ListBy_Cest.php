<?php 

class _06_Info_ListBy_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }
    public function InfoListBy(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Get the the Matching fields in the List');
        $data = $I->sendGET('Info/ListBy/2019-02-07/2020-02-07/1/10');
        $I->DisplayResponse($data); //This is response Time
        $I->wantTo('see if response Time is contained in the response array');
        $I->seeResponseContainsJson(['total' => 183]);
        // it can match tree-like structures as well
        $I->seeResponseContainsJson([
          'data' => [
                'ROWNUM' => '1',
                'TOPIC_ID' => '230',
                'TOPIC_NAME' => '11111',
                'STATE' => '0',
                ]
            ]);
        // $data = $I->grabDataFromResponseByJsonPath('debug');
        $I->grabResponse();
        $I->CheckResponseTimeEquals($data);
        // $I->CheckId();
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
    }
}
