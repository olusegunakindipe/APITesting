<?php 

class _42_User_GetUserPackageList_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function UserGetUserPackageList(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('check possible data in the API record corresponding');
        $data=$I->sendGET('/User/GetUserPackageList/100000227661/1/20');
        $I->wantTo('check json data');
        $I->CheckDataFlatComplex($data);
        // $I->wantTo('Get response is empty');
        // $I->CheckForEmptiness($data);
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->grabResponse();
        $I->CheckResponseTimeEquals($data);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
    }
}
