<?php 

class _84_WorkBit_ListByRetail_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function WorkBitListRetail(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the some data are present in the API');
        $data = $I->sendGET('/WorkBit/ListByBisRetail/1/20');
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->grabResponse();
        $I->dontSeeResponseCodeIs(401);
        $I->seeResponseContainsJson([
            'BI_ID'=> '1',
            'SPLIT_TYPE' => '1',
            'RATIO_CHARGE_FEE' => '10.0000',
            'RETAIL_BEAR' => 0,
            'RETAIL_TYPE_NO' => 'RA166578220698731520',
            'CREATE_TIME'=> '2020-01-13 16:09:30'
        ]);
        $I->seeResponseContainsJson(['total' => 423, 'pageTotal'=>22]);
        $I->seeResponseIsJson(); 
        $I->seeResponseCodeIs(200); 
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
