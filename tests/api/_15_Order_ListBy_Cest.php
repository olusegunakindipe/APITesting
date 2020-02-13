<?php 

class _15_Order_ListBy_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }
    public function Order_List(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('check if data is accurate');
        $data = $I->sendGET('Order/ListBy/top/2019-02-07/2020-02-07/1/20');
        $I->wantTo('Check response Time for this Api');
        $I->DisplayResponse($data);
        $I->CheckForEmptiness($data);
        $I->CheckResponseTimeEquals($data);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
    }
}
