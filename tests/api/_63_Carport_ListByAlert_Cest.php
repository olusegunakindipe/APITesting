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
        $data = $I->sendGET('/Carport/ListByAlert/2019-02-11/2020-02-11/1/20');
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->wantTo('check if the data is not empty');
        $I->seeResponseContainsJson(['total' => 92, 'pageTotal'=>5, 'size'=>20]);
        $I->seeResponseContainsJson([
            'DEVICE_TYPE' => 1,
            'DEVICE_SN'=> '862980043422211',
            'CELL_ID'=>'3501040005',
            'CARPORT_ID' => '410305000420190509135908',
            'CARPORT_NAME' => '易安充小区测试车棚',
            'CELL_NAME' => '易安充测试小区',
            'ALERT_STATUS' => 0
        ]);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200); 
    }
}
