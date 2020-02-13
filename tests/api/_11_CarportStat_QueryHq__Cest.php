<?php 

class _11_CarportStat_QueryHq__Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }
    public function CarportStat(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Get spme fields in this api');
        $data = $I->sendGET('CarportStat/Query/hq/top/2019-02-07/2020-02-07');
        $I->grabResponse();
        $I->DisplayResponse($data);
        $I->seeResponseMatchesJsonType(['data'=>[
            'user_count' => 'string',
            'change_money' => 'string',
            'power' => 'string',
            'ArpuOrderNum' => 'string|null'
            ]
        ]);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
    }
}
