<?php 

class _29_Alert_ListByRealAlert_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }
    public function InfoListBy(ApiTester $I) 
    {
        $I->AdminLogin();
        $I->wantTo('Get the the Matching fields in the List');
        $data = $I->sendGET('Alert/ListByRealAlert/1/20');
        $I->DisplayResponse($data);
        $I->seeResponseContainsJson([
          'data' => [
                 'ALERT_TIME' => '2020-01-03 22:01:59.880',
                'DEVICE_TYPE' => 1,
                'DEVICE_SN' => '798798789798000',
                'CELL_ID' => null,
            ]
        ]);
        $I->CheckResponseTimeEquals($data);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200); 
    }
}
