<?php 

class _52_Carport_GetOrderInfo_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function CarPortGetOrderInfo(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('check possible data in the API record corresponding');
        $data=$I->sendGET('/Carport/GetOrderInfo/2019-02-11/2020-02-11');
        $I->DisplayResponse($data);
        $I->wantTo('Check if Datatype is correct');
        $I->seeResponseMatchesJsonType([ 'data'=>[
            'stopOrder' => 'string',
            'chargeOrder' => 'string',
            'totalOrder' => 'Integer',
            'validRatio' => 'string'
            ]
        ]);
        $I->CheckData($data);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
    }
}
