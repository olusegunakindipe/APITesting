<?php 

class _80_Carport_ListByStopRate_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function CarportList(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the some data are present in the API');
        $data = $I->sendGET('/Carport/ListByStopRate/1/20');
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->dontSeeResponseCodeIs(401);
        $I->seeResponseContainsJson([
            'RATE_NAME'=> '临停费率',
            'BILLING_TYPE'=> 2,
            'CELL_NAME' => '七星苑小区',
            'CARPORT_ID' => '450305001120200106030301',
            'DAY' => 1,
            'CELL_ID' => '4503050011',
            'UPDATE_TIME'=> '2020-01-13 17:32:10.480'
        ]);
        $I->seeResponseContainsJson(['total' => 43, 'pageTotal'=>3]);
        $I->seeResponseIsJson(); 
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
