<?php 

class _33_Carport_ListByWhiteList_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function CarportListByWhite(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the data are correctly stored');
        $page = 1;
        $size = 20;
        $urlParams = [
            $page,
            $size
        ];
        $api = "/Carport/ListByWhiteList/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->DisplayResponse($data);
        $I->grabResponse();
        // $I->CheckCarportListData($data);
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].model_no');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].MODEL_TYPE');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].CREATE_TIME');
        $I->seeResponseJsonMatchesJsonPath('$.data.pageInfo.pageTotal');
        $I->dontSeeResponseContainsJson(['data' => 401]);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200); 
    }
}
