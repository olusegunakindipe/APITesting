<?php 

class _43_User_GetUserBalanceRecord_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function UserGetUserBalance(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('check possible data in the API record corresponding');
        $data=$I->sendGET('/User/GetUserBalanceRecord/100000227661/1/20');
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->wantTo('check if the data is empty');
        $I->seeResponseContainsJson(['total' => 0, 'pageTotal'=>0, 'size'=>20]);
        $I->wantTo('Get response is empty');
        $I->CheckForEmptiness($data);
        $I->SeeResponseContainsJson(['data' => []]);
        $I->SeeResponseContainsJson(['query' => 2]);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
    }
}
