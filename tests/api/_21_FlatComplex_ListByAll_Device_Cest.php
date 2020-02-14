<?php 

class _21_FlatComplex_ListByAll_Device_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function FlatComplexList(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('check if data is accurate');
        $I->sendGET('FlatComplex/ListByAllDevice/1/20');
        $I->wantTo('Check response Time for this Api');
        $data = $I->grabDataFromResponseByJsonPath('debug');
        echo "Response Time is:";
        print_r($data[0]['time']);
        $I->wantTo('Check if data is mcontained in json');
        $I->seeResponseContainsJson(['data'=>[
            'CELL_ID' => '4503030004',
            'CELL_NAME' => '叠彩嘉园',
            'CREATE_TIME' => '2020-02-14 15:25:57.473',
            'METER_NUM' => 15
            ]
        ]);
      
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
    }
}
