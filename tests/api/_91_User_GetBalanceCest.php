<?php 

class _91_User_GetBalanceCest
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
        $data = $I->sendGET('/WorkBit/ListByUserWithdraw/1/20');
        $I->wantTo('Check response Time for this Api');
        $I->DisplayResponse($data);;
        $I->getOrderListData($data);
        $I->CheckResponseTimeEquals($data);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
    }
}
