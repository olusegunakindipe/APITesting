<?php 

class _07_Statistics_Info_Hq_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function InfoListBy(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Get the Matching fields in the List');
        $data = $I->sendGET('/Statistics/Info/hq/top');
        $I->DisplayResponse($data);
        $I->wantTo('see if data is the List');
        // $I->CheckInfoList($data);
        $I->grabResponse();
        // $I->CheckResponseTimeEquals($data);
        $I->seeResponseJsonMatchesJsonPath('$.data.change_money');
        $I->seeResponseJsonMatchesJsonPath('$.data.total_count');
        $I->seeResponseJsonMatchesJsonPath('$.data.power');
        $I-> seeResponseMatchesJsonType(['data' =>
            [
                'change_money' => 'float',
                'total_count' => 'integer',
                'power' => 'string',
                'user_count' => 'integer'
            ]
        ]);
        // $I->CheckId();
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        // just test data, no other field
    }
}
