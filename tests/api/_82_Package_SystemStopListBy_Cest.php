<?php 

class _82_Package_SystemStopListBy_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function PackageSystemStop(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check data are correct');
        $data = $I->sendGET('/Package/SystemStopListBy/1/20');
        $I->wantTo('Get response time');
        $I->DisplayResponse($data);
        $I->TestPackageSystemStop($data);
        $I->seeResponseIsJson(); 
        $I->dontSeeResponseCodeIs(401); 
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
