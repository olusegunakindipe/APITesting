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
        $startDate = "2020-01-11";
        $endDate = "2020-02-11";
        $page = 1;
        $size = 20;
        $urlParams = [
            $startDate,
            $endDate,
            $page,
            $size
        ];
        $api = "/Order/GetRefundInfo/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->haveHttpHeader('accept', 'application/json');
        $I->seeHttpHeader('Content-Type','application/json');
        // $I->getOrder($data);
        $I->seeResponseJsonMatchesJsonPath('$.data.NUM');
        $I->seeResponseJsonMatchesJsonPath('$.data.TOTAL_FEE');
        $I->dontSeeResponseContainsJson(['code' => 404]);
        $I->seeResponseCodeIs(200);
    }
}
