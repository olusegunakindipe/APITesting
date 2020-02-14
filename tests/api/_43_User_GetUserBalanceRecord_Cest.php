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
        $I->seeResponseContainsJson(['total' => 1, 'pageTotal'=>1, 'size'=>20]);
     
        $I->SeeResponseContainsJson(['data' => [
            'ORDER_ID' => 'CO20200211170757bb4546f9ba945068',
            'PAY_STATE' => 1,
            'moneyType' => 1,
            'createTime' => '2020-02-11 21:08:25'
        ]]);
        $I->SeeResponseContainsJson(['query' => 2]);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
    }
}
