<?php 

class _56_CarportListByMeter_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function CarportListByMeter(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('check if data is in the API');
        $page = 1;
        $size = 20;
        $urlParams = [
            $page,
            $size
        ];
        $api = "/Carport/ListByMeter/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->wantTo('Check response Time for this Api');
        $I->DisplayResponse($data);
        $I->wantTo('See if the data are correct');
        // $I->CheckForValue($data);
        $I->seeResponseJsonMatchesJsonPath('$.data...ELECTRICITY_METER_SN');
        $I->seeResponseJsonMatchesJsonPath('$.data...CELL_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data...CELL_NAME');
        $I->seeResponseJsonMatchesJsonPath('$.data...ELECTRICITY_METER_NAME');
        $I->seeResponseJsonMatchesJsonPath('$.data.pageInfo.total');
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->dontSeeResponseContainsJson(['data' => 'invalid page']);
        $I->grabResponse();
        // $I->CheckResponseTimeEquals($data);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200); 
    }
}

