<?php 

class _39_Package_UserStopListBy_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function PackageUserStop(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('check possible data in the API record corresponding');
        $startDate = "2020-01-07";
        $endDate = "2020-02-07";
        $page = 1;
        $size = 20;
        $urlParams = [
            $startDate,
            $endDate,
            $page,
            $size
        ];
        $api = "/Package/UserStopListBy/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->DisplayResponse($data);
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].CELL_NAME');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].CELL_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].PACKAGE_ORDER_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].CAR_TYPE_NAME');
        $I->seeResponseJsonMatchesJsonPath('$.data.pageInfo.pageTotal');
        $I->dontSeeResponseCodeIs(401);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
    }  

}
