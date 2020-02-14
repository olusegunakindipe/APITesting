<?php 

class _49_User_GetUserStopOrder_Cest
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
        $data=$I->sendGET('/User/GetUserStopOrder/100000049408/1/20');
        $I->DisplayResponse($data);
        $I->CheckUserStopPackage($data);
        $I->dontSeeResponseCodeIs(404);
        $I->seeResponseIsJson();
        $I->SeeResponseContainsJson(['code' => 200]);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
