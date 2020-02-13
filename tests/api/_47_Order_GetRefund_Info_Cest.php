<?php 

class _47_Order_GetRefund_Info_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function GetRefundInfo(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Get the Matching fields in the List');
        $data = $I->sendGET('/Order/GetRefundInfo/2019-02-11/2020-02-11');
        $I->haveHttpHeader('accept', 'application/json');
        $I->seeHttpHeader('Content-Type','application/json');
        $I->SeeResponseContainsJson(['data' => null]);
        $I->SeeResponseContainsJson(['code' => 404]);
        $I->dontseeResponseCodeIs(200); 
        $I->SeeResponseCodeIs(404);
    }
}
