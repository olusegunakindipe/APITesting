<?php 

class _45_User_GetUserPackage_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function UserGetUserPackage(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('check possible data in the API record corresponding');
        $data=$I->sendGET('/User/GetUserPackage/100000056848/1/20');
        $I->wantTo('check if the data is empty');
        $I->CheckData($data);
        // $I->seeResponseContainsJson(['total' => 0, 'pageTotal'=>0]);
        // $I->wantTo('Get response is empty');
        // $I->CheckForEmptiness($data);
        // $I->wantTo('Get response Time for this Api');
        // $I->DisplayResponse($data);
        // $I->grabResponse();
        // $I->CheckResponseTimeEquals($data);
        // $I->seeResponseIsJson();
        // $I->seeResponseCodeIs(200);
    }
}
