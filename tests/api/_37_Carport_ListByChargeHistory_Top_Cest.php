<?php 

class _37_Carport_ListByChargeHistory_Top_Cest
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
            $page,
            $size
        ];
        $api = "/Carport/ListByChargeHistory/top/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $data=$I->sendGET('Carport/ListByChargeHistory/top/2019-02-07/2020-02-07/1/20');
        $I->DisplayResponse($data);
        $I->dontSeeResponseCodeIs(401);
        $I->wantTo('Check for Carport Charge History');
        $I->CheckCarportChargeHistory($data);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
    }
        
}
