<?php 

class _75_Carport_ListByFlatComplex_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function CarportListByFlat(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the some data are present in the API');
        $page = 1;
        $size = 20;
        $urlParams = [
            $page,
            $size
        ];
        $api = "/Carport/ListByFlatComplex/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].CELL_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].MAX_CHARGE_MINUTE');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].CELL_TYPE');
        $I->seeResponseJsonMatchesJsonPath('$.data.pageInfo.total');
        // $I->CheckTestData($data);
        $I->seeResponseIsJson(); 
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
