<?php 

class _36_Carport_ListByCurrentOrder_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function CarportListByCurrentOrder(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('check if data is in the API');
        $page = 1;
        $size = 20;
        $urlParams = [
            $page,
            $size
        ];
        $api = "/Carport/ListByCurrentOrder/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->wantTo('Check response Time for this Api');
        $I->DisplayResponse($data);
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].CELL_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].USER_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].CHARGE_ORDER_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].MOBILE_PHONE');
        $I->dontSeeResponseContainsJson(['code' => 401]);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
    }

}
