<?php 

class _27_Hq_Info_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function HQInfo(ApiTester $I) {
        $I->AdminLogin();
        $I->wantTo('Get the response Time of ToolMenuApi');
         $data = $I->sendGET('Hq/Info');
         $I->DisplayResponse($data); //This is response Time
        //  print_r($data);
        $datas = $I->grabDataFromResponseByJsonPath('data');
        $I->seeResponseMatchesJsonType([ 'data'=>
        ['type' => 'string',
        'province' => 'array',
        'num_site' => 'string',
        
        ]
        // 'is_active' => 'boolean'
   ]);
        $I->dontSeeResponseContainsJson(['total' => 0]);
         $I->CheckResponseTimeEquals($data);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
        
    }
}
