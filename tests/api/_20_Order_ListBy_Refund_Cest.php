<?php 

class _20_Order_ListBy_Refund_Cest
{
    public function _before(ApiTester $I)
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
        $I->seeHttpHeader('Content-Type', 'application/json');
        $I->wantTo('get if data is accurate as specified on the Api');
        // $I->CheckRefundNos($data);
        $I->wantTo('Check response Time for this Api');
        $I->DisplayResponse($data);
        $I->seeResponseJsonMatchesJsonPath('$.data.data.[0].ID');
        $I->seeResponseJsonMatchesJsonPath('$.data.data.[0].TYPE');
        $I->seeResponseJsonMatchesJsonPath('$.data.data.[0].REFUND_ORDER_NO');
        $I->seeResponseJsonMatchesJsonPath('$.data.data.[0].USER_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data.pageInfo.total');
        $I->seeResponseJsonMatchesJsonPath('$.data.pageInfo.pageTotal');
        $I->dontSeeResponseContainsJson(['code' => 401]);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200); 
    }
}
