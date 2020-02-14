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
        $data = $I->sendGET('Package/UserDurationListBy/2019-02-07/2020-02-07/1/20');
        $I->haveHttpHeader('accept', 'application/json');
        $I->seeHttpHeader('Content-Type','application/json');
        $I->seeResponseContainsJson(['total' => 11217, 'pageTotal'=>561]);
        $I->CheckUserDurationData($data);
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->grabResponse();
        $I->CheckResponseTimeEquals($data);
        // $I->CheckId();
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200); 
    }
}
