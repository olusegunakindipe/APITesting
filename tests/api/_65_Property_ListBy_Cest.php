<?php 

class _65_Property_ListBy_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function PropertyListBy(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the some data are present in the API');
        $data = $I->sendGET('/Property/ListBy/1/20');
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->wantTo('check if the data is empty');
        $I->checkPropertyData($data);
        $I->seeResponseContainsJson(['total' => 415, 'pageTotal'=>21, 'size'=>20]);
        $I->seeResponseIsJson(); 
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
