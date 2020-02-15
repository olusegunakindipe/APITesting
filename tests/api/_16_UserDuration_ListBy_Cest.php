<?php 

class _16_UserDuration_ListBy_Cest
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
        $I->wantTo('Get data response from the API');
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
        $api = "/Package/UserDurationListBy/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->haveHttpHeader('accept', 'application/json');
        $I->seeHttpHeader('Content-Type','application/json');
        $I->CheckUserDurationData($data);
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->grabResponse();
        $I->CheckResponseTimeEquals($data);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200); 
    }
}
