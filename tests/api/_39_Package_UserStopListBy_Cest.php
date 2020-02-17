<?php 

class _39_Package_UserStopListBy_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }
    public function CarportChargeHistory(ApiTester $I)
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
        // $I->CheckResponseTimeEquals($data);
        // $I->CheckCarportChargeData($data);
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].PACKAGE_ORDER_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].USER_ID');
        $I->dontSeeResponseCodeIs(401);
         $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
    }  

}
