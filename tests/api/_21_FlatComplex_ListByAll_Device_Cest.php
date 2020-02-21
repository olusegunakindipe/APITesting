<?php 

class _21_FlatComplex_ListByAll_Device_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function FlatComplexList(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('check if data is accurate');
        $page = 1;
        $size = 20;
        $urlParams = [
            $page,
            $size
        ];
        $api = "FlatComplex/ListByAllDevice/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->wantTo('Check response Time for this Api');
        $data = $I->grabDataFromResponseByJsonPath('debug');
        echo "Response Time is:";
        print_r($data[0]['time']);
        $I->wantTo('Check if data is contained in json');
        $I->seeResponseJsonMatchesJsonPath('$.data.data.[0].CELL_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data.data.[0].CELL_NAME');
        $I->seeResponseJsonMatchesJsonPath('$.data.data.[0].CREATE_TIME');
        $I->seeResponseJsonMatchesJsonPath('$.data.data.[0].ALARM_NUM');
        $I->seeResponseJsonMatchesJsonPath('$.data.pageInfo.pageTotal');
        $I->dontSeeResponseCodeIs(404);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
    }
}
