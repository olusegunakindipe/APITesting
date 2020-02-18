<?php 

class _46_Package_UserDurationListBy_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function PackageUserDuration(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the some data are present in the API');
        $data = $I->sendGET('Carport/ListByAll');
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->seeResponseJsonMatchesJsonPath('$.data...CARPORT_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data...CARPORT_NAME');
        $I->seeResponseIsJson();
        $I->dontseeResponseCodeIs(401);
    }
}
