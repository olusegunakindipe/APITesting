<?php 

class _55_Carport_GetRechargeInfo_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }
    
    public function CarportGetRechargeInfo(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('check if data is in the API');
        $data = $I->sendGET('/Carport/GetRechargeInfo/2019-02-11/2020-02-11/1/20');
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->wantTo('Check response Time for this Api');
        $I->DisplayResponse($data);
        $I->CheckForData($data);
        $I->wantTo('See if the datatypes are correct');
        $I->seeResponseMatchesJsonType(['data'=>[
            'rechargeOrder' => 'string',
            'rechargeUser' => 'string',
            'arpuIncome' => 'string',
            'log' => 'array'
            ]
        ]);
        $I->wantTo('Check if this particular date is present');
        $I->SeeResponseContainsJson(['statistics_date' => '2020-02-09']);
        $I->DontSeeResponseCodeIs(401); 
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
