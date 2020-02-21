<?php 

class _26_FlatComplex_ListAllPort_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function FlatComplexListAllPort(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the data is correct');
        $page = 1;
        $size = 20;
        $urlParams = [
            $page,
            $size
        ];
        $api = "/FlatComplex/ListByAllPort/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->wantTo('check if the data are of specfic value');
        $I->seeResponseJsonMatchesJsonPath('$.data.data.[0].ID');
        $I->seeResponseJsonMatchesJsonPath('$.data.data.[0].ELECTRICITY_METER_SN');
        $I->seeResponseJsonMatchesJsonPath('$.data.data.[0].CELL_NAME');
        $I->seeResponseJsonMatchesJsonPath('$.data.data.[0].CHARGING_PILE_SN');
        $I->seeResponseJsonMatchesJsonPath('$.data.pageInfo.pageTotal');
        $I->seeResponseIsJson();
        $I->dontSeeResponseCodeIs(401);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
