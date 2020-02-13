<?php 

class _23_SearchBy_Useless_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function SearchByUseless(ApiTester $I){
        $I->AdminLogin();
        $I->wantTo('test the values of fields in this api');
        $data = $I->sendGET('Meter/SearchByUseless');
        // $I->grabResponse();
        $I->DisplayResponse($data);
         $I->seeResponseContainsJson(['data'=>
         
            ['ELECTRICITY_METER_SN' => '1',
            'ELECTRICITY_METER_MODEL' => '1',
            'ELECTRICITY_METER_NAME' => '1',      
            ]
       ]);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
        
    }
}
