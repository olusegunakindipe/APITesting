<?php 

class _24_List_ByAll_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }
    public function PileListByAll(ApiTester $I) 
    {
        $I->AdminLogin();
        $I->wantTo('Check for data correctness');
        $data = $I->sendGET('Pile/ListByAll/1/20');
        $I->DisplayResponse($data);
        $I->seeResponseIsJson();
        $I->CheckResponseTimeEquals($data);
        $I->seeResponseContainsJson(['ID'=> "248909", 'CHARGING_PILE_SN' => "12345678999999", 'CHARGING_PILE_STATE'=> "1"]);
        $I->seeResponseCodeIs(200);
    }

}
