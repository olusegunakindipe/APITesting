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
        $api = "/Carport/GetRechargeInfo/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->wantTo('Check response Time for this Api');
        $I->DisplayResponse($data);
        // $I->CheckForData($data);
        $I->wantTo('See if the datatypes are correct');
        $I->seeResponseMatchesJsonType(['data'=>[
            'rechargeOrder' => 'string',
            'rechargeUser' => 'string',
            'arpuIncome' => 'string',
            'log' => 'array'
            ]
        ]);
        $I->wantTo('Check if this particular date is present');
        $I->DontSeeResponseCodeIs(401); 
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
