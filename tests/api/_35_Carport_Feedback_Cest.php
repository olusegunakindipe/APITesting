<?php 

class _35_Carport_Feedback_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }
    Public function CarPortFeedBack(ApiTester $I) {

        $I->AdminLogin();
        $I->wantTo('Get to the data in the List');
        $I->haveHttpHeader('accept', 'application/json');
        $I->seeHttpHeader('Content-Type','application/json');
        $data = $I->sendGET('Carport/Feedback/2019-02-07/2020-02-07/1/20');

        $I->dontSeeResponseMatchesJsonType([
          'data' => [
                'total' => 'integer',
                'pageTotal' => 'integer'
                  
                ]
            ]);
        $I->dontSeeResponseCodeIs(401);
        $I->SeeResponseContainsJson(['data' => []]);
        $I->CheckForEmptiness($data);
        $I->DisplayResponse($data);
        $I->grabResponse();
        $I->CheckResponseTimeEquals($data);
        // $I->CheckId();
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
    }
}
