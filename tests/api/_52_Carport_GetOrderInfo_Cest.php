<?php 

class _52_Carport_GetOrderInfo_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function CarPortGetOrderInfo(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('check possible data in the API record corresponding');
        $startDate = '2020-01-11';
        $endDate = '2020-02-11';
        $urlParams = [
            $startDate,
            $startDate
        ];
        $api = "/Carport/GetOrderInfo/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->DisplayResponse($data);
        $I->wantTo('Check if Datatype is correct');
        $I->seeResponseMatchesJsonType([ 'data'=>[
            'stopOrder' => 'string',
            'chargeOrder' => 'string',
            'totalOrder' => 'Integer',
            'validRatio' => 'string'
            ]
        ]);
        $I->dontSeeResponseContainsJson(['code' => '401']);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
    }
}
