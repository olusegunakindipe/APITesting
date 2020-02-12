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
    public function UserGetRecharge(ApiTester $I){
        $I->AdminLogin();
        $I->wantTo('Check if the some data are accurate');
        $data = $I->sendGET('User/GetRechargeInfo/2019-02-07/2020-02-07/1/20');
        // $I->CheckPresence();
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
         $I->seeResponseMatchesJsonType([ 'data'=>
         ['rechargeOrder' => 'string',
         'rechargeUser' => 'string',
         'rechargeMoney' => 'string',
    ]
         
    ]);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200); 
    }
}
