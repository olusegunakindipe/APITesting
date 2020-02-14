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
    public function CarPortFeedBack(ApiTester $I) 
    {
        $I->AdminLogin();
        $I->wantTo('Get to the data in the List');
        $data = $I->sendGET('Carport/Feedback/2019-02-07/2020-02-07/1/20');
        $I->haveHttpHeader('accept', 'application/json');
        $I->seeHttpHeader('Content-Type','application/json');
        $I->dontSeeResponseCodeIs(401);
        $I->SeeResponseContainsJson(['data' => [
            'ID' => 980,
            'USER_ID' => '100000181666',
            'QUESTTYPE' => 3,
            "PHONE" => '13076913310'
        ]]);
        $I->DisplayResponse($data);
        $I->grabResponse();
        $I->CheckResponseTimeEquals($data);
        // $I->CheckId();
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
    }
}
