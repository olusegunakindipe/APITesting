<?php 

class _66_FlatComplex_ListBy_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function FlatComplexListBy(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('check if data is accurate');
        $page = 1;
        $size = 20;
        $urlParams = [
            $page,
            $size
        ];
        $api = "/FlatComplex/ListBy/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->wantTo('Check response Time for this Api');
        $I->DisplayResponse($data);
        // $I->checkFlatComplexList($data);
        $I->seeResponseJsonMatchesJsonPath('$.data...CELL_TYPE');
        $I->seeResponseJsonMatchesJsonPath('$.data...CELL_DISTRICT_CODE');
        $I->seeResponseJsonMatchesJsonPath('$.data...CELL_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data...CELL_NAME_ABBREVIATION');
        $I->dontSeeResponseContainsJson(['code' => 401]);
        $I->dontSeeResponseContainsJson(['data' => 'invalid page']);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
    }
}
