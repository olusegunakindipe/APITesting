<?php 

class _33_Carport_ListByWhiteList_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }
    public function CarportListByWhite(ApiTester $I) {

        $I->AdminLogin();
        $I->wantTo('Check if the data are correctly stored');
        $data = $I->sendGET('Carport/ListByWhiteList/1/20');
         $I->grabResponse();
         $I->DisplayResponse($data);
         $I->CheckDataIsEmpty($data);
         $I->SeeResponseContainsJson(['data' => []]);
        // $I->CheckId();
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200); 
    }
}
