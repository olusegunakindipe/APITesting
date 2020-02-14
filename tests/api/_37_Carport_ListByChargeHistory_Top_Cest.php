<?php 

class _37_Carport_ListByChargeHistory_Top_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function CarportChargeHistory(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('check possible data in the API record corresponding');
        $data=$I->sendGET('Carport/ListByChargeHistory/top/2019-02-07/2020-02-07/1/20');
        $I->DisplayResponse($data);
        $I->dontSeeResponseCodeIs(401);
        $I->wantTo('Check for Carport Charge History');
        $I->CheckCarportChargeHistory($data);
        // $I->CheckResponseTimeEquals($data);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
    }
        
}
