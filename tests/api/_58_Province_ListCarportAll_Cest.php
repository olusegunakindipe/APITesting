<?php 

class _58_Province_ListCarportAll_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function ProvinceListCarport(ApiTester $I) 
    {
        $I->AdminLogin();
        $I->wantTo('Get to the data in the List');
        $data = $I->sendGET('Province/ListByCarportAll');
        $I->wantTo('Check the correctness of these data');
        $I->seeResponseContainsJson([
            'data' => [
                'DISTRICT_CODE' => '460000',
                'DISTRICT_NAME' => '海南省',
                'GPS_LAT' =>'20.0317936000', 
                'GPS_LNG' =>'110.3465118000'
            ]
        ]);
        $I->DisplayResponse($data);
        $I->grabResponse();
        $I->CheckResponseTimeEquals($data);
        $I->seeResponseIsJson();
        $I->DontSeeResponseCodeIs(401);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
    }
}
