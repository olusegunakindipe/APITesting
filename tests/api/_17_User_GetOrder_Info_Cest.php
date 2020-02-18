<?php 

class _17_User_GetOrder_Info_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function UserGetOrderInfo(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Get the Matching fields in the List');
        $startDate = '2020-01-07';
        $endDate = '2020-02-07';
        $urlParams = [
            $startDate,
            $endDate
        ];
        $api = "/User/GetOrderInfo/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->haveHttpHeader('accept', 'application/json');
        $I->seeHttpHeader('Content-Type', 'application/json');
        $I->dontSeeResponseContainsJson(['code' => 401]);
        $I->wantTo('get if data is accurate as specified on the Api');
        $I->seeResponseJsonMatchesJsonPath('$.data.packageOrder');
        $I->seeResponseJsonMatchesJsonPath('$.data.chargeOrder');
        $I->seeResponseJsonMatchesJsonPath('$.data.totalOrder');
        $I->seeResponseJsonMatchesJsonPath('$.data.stopOrder');
        $I-> seeResponseMatchesJsonType(['data' =>
            [
                'chargeOrder' => 'string',
                'packageOrder' => 'integer',
                'log' => 'array',
            ]
        ]);

        $I->grabResponse();
        $I->DisplayResponse($data);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200); 
    }
}
