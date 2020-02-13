<?php 

class _53_Carport_ListByRechange_Cest
{
    public function _before(ApiTester $I)
    {
    }
    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function CarportListByRechange(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the some data are present in the API');
        $data = $I->sendGET('/Carport/ListByRechange/2019-02-11/2020-02-11/1/20');
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->wantTo('check if the data is empty');
        $I->seeResponseContainsJson(['total' => 0, 'pageTotal'=>0, 'size'=>20]);
        $I->wantTo('Get response is empty');
        $I->CheckForEmptiness($data);
        $I->SeeResponseContainsJson(['data' => []]);
        $I->SeeResponseContainsJson(['query' => 2]);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200); 
    }
}
