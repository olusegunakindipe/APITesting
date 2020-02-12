<?php 

class _09_User_UserGetInfo_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }
    
    public function UserGetInfo(ApiTester $I) {

        $I->AdminLogin();
        $I->wantTo('Check if the data are correctly stored');
        $data = $I->sendGET('User/GetUserInfo/2019-02-07/2020-02-07');
         $I->grabResponse();
         $I->CheckDetail($data);
         $I->DisplayResponse($data);
         
        // $I->CheckId();
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
    }
}
