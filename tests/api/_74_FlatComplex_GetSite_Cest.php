<?php 

class _74_FlatComplex_GetSite_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function PropertyListBy(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the some data are present in the API');
        $data = $I->sendGET('/FlatComplex/GetSite/341881000120200117113317');
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->seeResponseContainsJson([
            'ID' => '1818',  
            'CELL_ID' => '3418810001',
             "GPS_LAT" => "30.6335733000",
            "CELL_DISTRICT_CODE" => "341881",
            'GPS_LNG' => '118.9829850000',
        ]);
        $I->seeResponseIsJson(); 
        $I->dontSeeResponseCodeIs(401);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
