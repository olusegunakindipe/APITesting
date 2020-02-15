<?php 

class _19_User_GetRechargeInfo_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }
    public function UserGetRecharge(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the some data are accurate');
        $startData ="2020-01-07";
        $endDate = "2020-02-07";
        $page = 1;
        $size = 20;
        $urlParams = [
            $startData,
            $endDate,
            $page,
            $size
        ];
        $api = "/User/GetRechargeInfo/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->seeResponseMatchesJsonType([ 'data'=>[
            'rechargeOrder' => 'string',
            'rechargeUser' => 'string',
            'rechargeMoney' => 'string',
            ]
        ]);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200); 
    }
}
