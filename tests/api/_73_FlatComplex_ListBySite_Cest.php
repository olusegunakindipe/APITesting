<?php 

class _73_FlatComplex_ListBySite_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function FlatComplexListBySite(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the some data are present in the API');
        $page = 1;
        $size = 20;
        $urlParams = [
            $page,
            $size
        ];
        $api = "/FlatComplex/ListBySite/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->dontSeeResponseContainsJson(['code' => 401]);
        // $I->GetFlatComplexSiteList($data);
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].CELL_CONTACT_PERSON');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].GPS_LNG');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].CELL_TELEPHONE');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].SITE_NAME');
        $I->seeResponseJsonMatchesJsonPath('$.data.pageInfo.total');
        $I->dontSeeResponseContainsJson(['data' => 'invalid page']);
        $I->dontSeeResponseContainsJson(['data' => 'invalid size']);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200); 
    }
}
