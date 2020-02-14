<?php 

class _71_Project_ListBy_Cest
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
        $data = $I->sendGET('/Project/ListBy/1/20');
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->checkForData($data);
        $I->wantTo('check if the data corresponds');
        $I->checkPropertyData($data);
        $I->seeResponseContainsJson(['total' => 415, 'pageTotal'=>21, 'size'=>20]);
        $I->seeResponseIsJson(); 
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
