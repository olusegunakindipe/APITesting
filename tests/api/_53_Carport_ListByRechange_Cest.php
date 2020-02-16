<?php 

class _53_Carport_ListByRechange_Cest
{
    public function _before(ApiTester $I)
    {
    }
    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function CarportListByRechange(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the some data are present in the API');
        $startDate = '2020-01-11';
        $endDate = '2020-02-11';
        $page = 1;
        $size = 20;
        $urlParams = [
            $startDate,
            $endDate,
            $page,
            $size
        ];
        $api = "/Carport/ListByRechange/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->wantTo('Get response Time for this Api');
        // $I->CarportList($data);
        $I->DisplayResponse($data);
        $I->wantTo('check if the correctness of data');
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].ID');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].RECHARGE_ORDER_ID');
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200); 
    }
}
