<?php 

class _60_Carport_ListByDevice_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function CarportListByAllDevice(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('check if data is in the API');
        $page = 1;
        $size = 20;
        $urlParams = [
            $page,
            $size
        ];
        $api = "/Carport/ListByDevice/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->wantTo('Check response Time for this Api');
        $I->DisplayResponse($data);
        $I->wantTo('See if the data are correct');
        // $I->CheckCarportDeviceData($data);
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].ENTRANCE_GUARD_NAME');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].CARPORT_NAME');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].DEVICE_SN');
        $I->seeResponseJsonMatchesJsonPath('$.data.pageInfo.total');
        $I->dontSeeResponseContainsJson(['data' => 'invalid page']);
        $I->dontSeeResponseContainsJson(['data' => 'invalid size']);
        $I->grabResponse();
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200); 
    }
}
