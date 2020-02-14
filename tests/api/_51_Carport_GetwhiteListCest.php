<?php 

class _51_Carport_GetwhiteListCest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function CarportGetWhiteList(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('check if data is in the API');
        $data = $I->sendGET('/Carport/GetWhiteList/23');
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->wantTo('Check response Time for this Api');
        $I->DisplayResponse($data);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
        $I->checkData($data);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }

}