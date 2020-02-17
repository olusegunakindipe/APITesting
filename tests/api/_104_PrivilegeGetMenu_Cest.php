<?php 

class _104_PrivilegeGetMenu_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }
    public function PrivilegeListByRole(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Get the get usermenu data');
        $id = 1;
        $urlParams = [
            $id
        ];
        $api = "/Privilege/GetMenuPrivilege/hq/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->DisplayResponse($data); 
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->dontSeeResponseCodeIs(401);
        $I->DisplayResponse($data);
        $I->dontSeeResponseContainsJson(['data' => null]);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
