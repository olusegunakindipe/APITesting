<?php 

class _20_Order_ListBy_Refund_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }
    public function OrderListByRefund(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Get the Matching fields in the List');
        $data = $I->sendGET('Order/ListByRefund/2019-02-07/2020-02-07/1/20');
        $I->haveHttpHeader('accept', 'application/json');
        $I->seeHttpHeader('Content-Type','application/json');
        $I->dontSeeResponseContainsJson(['code' => 401]);
        $I->wantTo('get if data is accurate as specified on the Api');
        $I->CheckRefundNos($data);
        $I->wantTo('Check response Time for this Api');
        $I->DisplayResponse($data);
        $I->seeResponseIsJson();
        $I->dontSeeResponseCodeIs(401);
        $I->seeResponseCodeIs(200); 
    }
}
