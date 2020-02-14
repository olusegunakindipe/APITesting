<?php 

class _62_Carport_ListByRealAlert_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function CarportListByRealAlert(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the some data are present in the API');
        $data = $I->sendGET('/Carport/ListByRealAlert/1/20');
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->wantTo('check if the data is not empty');
        $I->seeResponseContainsJson(['total' => 116, 'pageTotal'=>6, 'size'=>20]);
        $I->checkCarportList($data);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200); 
    }
}
