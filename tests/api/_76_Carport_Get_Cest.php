<?php 

class _76_Carport_Get_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function CarportGet(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the some data are present in the API');
        $data = $I->sendGET('/Carport/Get/510107000520200113032712');
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->CarportGetData($data);
        $I->seeResponseIsJson(); 
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
