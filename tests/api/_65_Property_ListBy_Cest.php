<?php 

class _65_Property_ListBy_Cest
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
        $page = 1;
        $size = 20;
        $urlParams = [
            $page,
            $size
        ];
        $api = "/Property/ListBy/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->wantTo('check if the data is present');
        // $I->checkPropertyData($data);
        $I->seeResponseJsonMatchesJsonPath('$.data...PROPERTY_ID');
        $I->dontSeeResponseContainsJson(['code' => 401]);
        $I->dontSeeResponseContainsJson(['data' => 'invalid page']);
        $I->dontSeeResponseContainsJson(['data' => 'invalid size']);
        $I->seeResponseIsJson(); 
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
