<?php 

class _33_Carport_ListByWhiteList_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
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
        $I->CheckCarportListData($data);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200); 
    }
}
