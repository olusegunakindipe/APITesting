<?php 

class _50_User_GetUserStopList_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function UserGetUserStopPackage(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('check possible data returns json');
        $page = 1;
        $size = 20;
        $id = '100000194423';
        $urlParams = [
            $id,
            $page,
            $size,
        ];
        $api = "/User/GetUserStopList/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->DisplayResponse($data);
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].MOBILE_PHONE');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].IN_USER_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].CREATE_TIME');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].ENTRANCE_GUARD_NAME');
        $I->seeResponseJsonMatchesJsonPath('$.data.pageInfo.pageTotal');
        $I->dontSeeResponseCodeIs(401);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
    }
}
