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
        $I->SeeResponseContainsJson([ 
            'NUM'=> 12739,
            'TOTAL_FEE' => 21705.91,
            'PACKAGE' => 0
        ]);
        $I->dontSeeResponseContainsJson(['code' => 404]);
        $I->seeResponseCodeIs(200);
    }
}
