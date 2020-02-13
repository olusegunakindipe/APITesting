<?php 

class _46_Package_UserDurationListBy_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function PackageUserDuration(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the some data are present in the API');
        $data = $I->sendGET('Carport/ListByAll');
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->seeResponseContainsJson([
            'CARPORT_ID'=> "410305000420190509135908", 
            'CARPORT_NAME' => "易安充小区测试车棚"
        ]);
        $I->seeResponseContainsJson([
            'CARPORT_ID'=> "110105000220191212100529", 
            'CARPORT_NAME' => "深圳111号车棚"
        ]);
        $I->CheckResponseTimeEquals($data);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
    }
}
