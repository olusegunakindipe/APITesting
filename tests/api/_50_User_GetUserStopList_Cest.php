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
        $I->wantTo('check possible data in the API record corresponding');
        $data=$I->sendGET('/User/GetUserStopList/100000049408/1/20');
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->DisplayResponse($data);
        $I->dontSeeResponseCodeIs(401);
        $I->seeResponseIsJson();
        $I->SeeResponseContainsJson([
            'IN_USER_ID' => '100000049408',
            'MOBILE_PHONE' => '13645184146',
            'AREA' => '江苏省南京市六合区',
            'USER_ID' => '100000049408',
            'CREATE_TIME' => '2019-10-22 16:21:13'
        ]);
        $I->dontSeeResponseCodeIs(401);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
    }

}
