<?php 

class _59_Carport_ListByAllPort_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function CarportListByAllDevice(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('check if data is in the API');
        $page = 1;
        $size = 20;
        $urlParams = [
            $page,
            $size
        ];
        $api = "/Carport/ListByAllPort/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->wantTo('Print response Time for this Api');
        $I->DisplayResponse($data);
        $I->wantTo('check if the data corresponds');
        $I->CheckAllDeviceData($data);
        $I->grabResponse();
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200); 
    }
}
