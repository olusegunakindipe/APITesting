<?php 

class _56_CarportListByMeter_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function CarportListByMeter(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('check if data is in the API');
        $data = $I->sendGET('/Carport/ListByMeter/1/20');
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->wantTo('Check response Time for this Api');
        $I->DisplayResponse($data);
        $I->wantTo('See if the data are correct');
        $I->seeResponseContainsJson([
            'ELECTRICITY_METER_SN' => '8888',
            'CELL_ID' => '4503050011',
            'CELL_NAME' => '七星苑小区',
            'PILE_NUM' => 1,
            'DEVICE_STATE' => 1
        ]);
        $I->CheckForValue($data);
        $I->grabResponse();
        $I->CheckResponseTimeEquals($data);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200); 
    }
}

