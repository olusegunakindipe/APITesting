<?php 

class _50_User_GetUserStopList_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }
    public function UserGetUserStopPackage(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('check possible data returns json');
        $page = 1;
        $size = 20;
        $id = '100000049408';
        $urlParams = [
            $page,
            $size,
            $id
        ];
        $api = "/User/GetUserStopList/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->DisplayResponse($data);
        $I->dontSeeResponseCodeIs(401);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
    }

}
