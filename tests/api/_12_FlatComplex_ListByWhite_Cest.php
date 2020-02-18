<?php 

class _12_FlatComplex_ListByWhite_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests

    public function FlatComplexListBy(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the data from the API is correct');
        $page = 1;
        $size = 20;
        $urlParams = [
            $page,
            $size
        ];
        $api = "FlatComplex/ListByWhite/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->DisplayResponse($data);
        $I->grabResponse();
        $I->seeResponseContains('data');
        $I->seeResponseJsonMatchesJsonPath('$.data...USER_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data...STATE');
        $I->seeResponseJsonMatchesJsonPath('$.data...MOBILE_PHONE');
        $I->seeResponseJsonMatchesJsonPath('$.data...CELL_ID');
        $I->dontseeResponseCodeIs(404);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
        // no any spec check?
    }
    
}
