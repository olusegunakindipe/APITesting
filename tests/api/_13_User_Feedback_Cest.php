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

    Public function UserFeedBack(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Get to the data in the List');
        $startDate ='2020-01-07';
        $endDate='2020-02-07';
        $page = 1;
        $size = 20;
        $urlParams = [
            $startDate,
            $endDate,
            $page,
            $size,            
        ];
        $api = "/User/Feedback/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->haveHttpHeader('accept', 'application/json');
        $I->seeHttpHeader('Content-Type','application/json');        
        // $I->TestForUserFeedbackData($data);
        $I->dontSeeResponseCodeIs(401);
        $I->DisplayResponse($data);
        $I->grabResponse();
        $I->dontSeeResponseMatchesJsonType(['id' => 'integer'], '$.data.data[0]');
        // $I->CheckResponseTimeEquals($data);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200); 
    }
}
