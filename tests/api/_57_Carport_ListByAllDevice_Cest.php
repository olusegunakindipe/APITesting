<?php 

class _57_Carport_ListByAllDevice_Cest
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
        $api = "/Carport/ListByAllDevice/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->wantTo('Check response Time for this Api');
        $I->DisplayResponse($data);
        $I->wantTo('See if the data are correct');
        // $I->GetDataCheck($data);
        $I->grabResponse();
        $I->dontSeeResponseContainsJson(['code' => 401]);
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].CELL_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].CELL_NAME');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].CREATE_TIME');
        // $I->CheckResponseTimeEquals($data);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200); 
    }
}
