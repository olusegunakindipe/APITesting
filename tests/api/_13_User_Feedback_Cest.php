<?php 

class _13_User_Feedback_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    Public function UserFeedBack(ApiTester $I) {

        $I->AdminLogin();
        $I->wantTo('Get to the data in the List');
        $I->haveHttpHeader('accept', 'application/json');
        $I->seeHttpHeader('Content-Type','application/json');
        $data = $I->sendGET('User/Feedback/2019-02-07/2020-02-07/1/20');

        $I->dontSeeResponseMatchesJsonType([
          'data' => [
                'total' => 'integer',
                  
                ]
            ]);
        $I->dontSeeResponseCodeIs(401);
        $I->CheckForEmptiness($data);
        $I->DisplayResponse($data);
         $I->grabResponse();
         $I->CheckResponseTimeEquals($data);
        // $I->CheckId();
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200); 
    }
}
