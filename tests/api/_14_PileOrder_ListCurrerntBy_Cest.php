<?php 

class _14_PileOrder_ListCurrerntBy_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    Public function ListCurrentBy(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the some data are present in the API');
        $data = $I->sendGET('PileOrder/ListCurrentBy/1/20');
        $I->grabResponse();
        $I->CheckPresence($data);
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200); 
    }
}
