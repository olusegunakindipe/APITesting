<?php 

class _39_Package_UserStopListBy_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }
    public function CarportChargeHistory(ApiTester $I){
        $I->AdminLogin();
        $I->wantTo('check possible data in the API record corresponding');
        $data=$I->sendGET('Package/UserStopListBy/2019-02-07/2020-02-07/1/20');
        $I->DisplayResponse($data);
        $I->wantTo('check if the data is empty');
         $I->CheckForEmptiness($data);
         
        $I->wantTo('Check for Data and also the page numbers');
        $I->CheckResponseTimeEquals($data);
        $I->SeeResponseContainsJson(['total' => 0, 'pageTotal' => 0, 'size' => 20]);
        $I->SeeResponseContainsJson(['data' => []]);
        $I->dontSeeResponseCodeIs(401);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
    }
        

}
