<?php 

class _62_Carport_ListByRealAlert_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function CarportListByRealAlert(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the some data are present in the API');
        $page = 1;
        $size = 20;
        $urlParams = [
            $page,
            $size
        ];
        $api = "/Carport/ListByRealAlert/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->wantTo('check if the data is present');
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].ALERT_TIME');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].DEVICE_SN');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].CARPORT_NAME');
        $I->dontSeeResponseContainsJson(['code' => 401]);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200); 
    }
}
