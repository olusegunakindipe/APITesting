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
        $startDate = "2020-01-07";
        $endDate = "2020-02-07";
        $page = 1;
        $size = 20;
        $urlParams = [
            $startDate,
            $endDate,
            $page,
            $size
        ];
        $api = "/Carport/Feedback/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->haveHttpHeader('accept', 'application/json');
        $I->seeHttpHeader('Content-Type','application/json');
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        // $I->getCarportFeebackData($data);
        $I->DisplayResponse($data);
        $I->grabResponse();
        // $I->CheckResponseTimeEquals($data);
        // $I->CheckId();
        $I->dontSeeResponseCodeIs(401);
        $I->seeResponseCodeIs(200); 
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
    }
}
