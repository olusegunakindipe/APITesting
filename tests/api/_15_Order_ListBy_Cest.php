<?php 

class _15_Order_ListBy_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function Order_List(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('check if data is accurate');
        $startDate = "2020-01-07";
        $endDate = "2020-02-07";
        $page = 1;
        $size = 20;
        $urlParams = [
            $startDate,
            $endDate,
            $page,
            $size
        ];
        $api = "Order/ListBy/top/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->wantTo('Check response Time for this Api');
        $I->seeResponseJsonMatchesJsonPath('$.data.data.[0].ORDER_TYPE');
        $I->seeResponseJsonMatchesJsonPath('$.data.data.[0].CHARGE_ORDER_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data.data.[0].CELL_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data.data.[0].NICK_NAME');
        $I->seeResponseJsonMatchesJsonPath('$.data.data.[0].CREATE_TIME');
        $I->seeResponseJsonMatchesJsonPath('$.data.pageInfo.total');
        $I->DisplayResponse($data);
        $I->dontSeeResponseCodeIs(401);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
    }
}
