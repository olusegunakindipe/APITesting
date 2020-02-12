<?php 

class _36_Carport_ListByCurrentOrder_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }
    public function CarportListByCurrentOrder(ApiTester $I){
        $I->AdminLogin();
        $I->wantTo('check if data is in the API');
        $data = $I->sendGET('Carport/ListByCurrentOrder/1/20');
        
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->wantTo('Check response Time for this Api');
        $I->DisplayResponse($data);
        
         $I->CheckUserAndCharge($data);
        
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
    }

}
