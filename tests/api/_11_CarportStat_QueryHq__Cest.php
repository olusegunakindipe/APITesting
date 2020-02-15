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
        $startDate = '2020-01-07';
        $endDate = '2020-02-07';
        $page = 1;
        $limit = 20;
        $urlParams = [
            $startDate,
            $endDate,
            $page,
            $limit
        ];
        $api = "/CarportStat/Query/hq/top/";
        $fullPath = $api . join("/", $urlParams);
        $data = $I->sendGET($fullPath);
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
