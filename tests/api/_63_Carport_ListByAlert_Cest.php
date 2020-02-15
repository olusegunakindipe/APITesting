<?php 

class _63_Carport_ListByAlert_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }
    public function CarportListByAlert(ApiTester $I)
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
        $api = "/Carport/ListByAlert/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->wantTo('check Carport alert data');
        $I->CheckCarportAlertData($data);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200); 
    }
}
