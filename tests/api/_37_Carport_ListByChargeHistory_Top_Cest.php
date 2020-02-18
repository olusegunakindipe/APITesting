<?php 

class _37_Carport_ListByChargeHistory_Top_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function CarportChargeHistory(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('check possible data in the API record corresponding');
        $startDate ='2020-01-07';
        $endDate = '2020-02-07';
        $page = 1;
        $size = 20;
        $urlParams = [
            $startDate,
            $endDate,
            $page,
            $size
        ];
        $api = "/Carport/ListByChargeHistory/top/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->DisplayResponse($data);
        $I->dontSeeResponseCodeIs(401);
        $I->wantTo('Check for Carport Charge History');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].CHARGE_ORDER_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].ID');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].USER_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].CELL_ID');
        $I->dontSeeResponseContainsJson(['data' => 'invalid page']);
        $I->dontSeeResponseContainsJson(['data' => 'invalid size']);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 

    }
        
}
