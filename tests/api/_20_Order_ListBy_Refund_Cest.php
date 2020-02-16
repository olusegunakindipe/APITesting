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
        $startData ="2020-01-07";
        $endDate = "2020-02-07";
        $page = 1;
        $size = 20;
        $urlParams = [
            $startData,
            $endDate,
            $page,
            $size
        ];
        $api = "/Order/ListByRefund/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->haveHttpHeader('accept', 'application/json');
        $I->seeHttpHeader('Content-Type','application/json');
        $I->dontSeeResponseContainsJson(['code' => 401]);
        $I->wantTo('get if data is accurate as specified on the Api');
        // $I->CheckRefundNos($data);
        $I->wantTo('Check response Time for this Api');
        $I->DisplayResponse($data);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->seeResponseCodeIs(200); 
    }
}
