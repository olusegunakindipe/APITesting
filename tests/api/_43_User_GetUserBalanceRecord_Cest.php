<?php 

class _43_User_GetUserBalanceRecord_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function UserGetUserBalance(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('check possible data in the API record corresponding');
        $id = '100000005210';
        $page = 1;
        $size = 20;
        $urlParams = [
            $id,
            $page,
            $size,
        ];
        $api = "/User/GetUserBalanceRecord/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->wantTo('check if response is in Json');
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->seeResponseJsonMatchesJsonPath('$.data...ORDER_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data...AFTER_BALANCE');
        $I->seeResponseJsonMatchesJsonPath('$.data...createTime');
        $I->seeResponseJsonMatchesJsonPath('$.data...moneyType');
        // $I->getUserBalanceData($data);
        $I->seeResponseIsJson();
        $I->dontseeResponseCodeIs(401);
        $I->seeResponseCodeIs(200);
    }
}
