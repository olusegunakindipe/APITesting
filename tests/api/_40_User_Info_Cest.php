<?php 

class _40_User_Info_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function UserInfo(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('check possible data in the API record corresponding');
        $data=$I->sendGET('User/Info/100000227661');
        $I->DisplayResponse($data);
        $I->wantTo('check if the data is empty');
        $I->CheckForEmptiness($data);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
    }
}
