<?php 

class _104_PrivilegeGetMenu_Cest
{
    public function _before(ApiTester $I)
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
        $I->DisplayResponse($data); //This is response Time
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->dontSeeResponseCodeIs(401);
        $I->DisplayResponse($data);
        $I->seeResponseJsonMatchesJsonPath('$.data...parent_id');
        $I->seeResponseJsonMatchesJsonPath('$.data...type');
        $I->seeResponseJsonMatchesJsonPath('$.data...methods');
        $I->seeResponseJsonMatchesJsonPath('$.data...icon');
        $I->dontSeeResponseContainsJson(['data' => null]);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
