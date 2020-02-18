<?php 

class _91_User_GetBalanceCest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function UsergetBalance(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('check if data is accurate');
       
        $api = "/User/GetBalance/";
      
        $data = $I->sendGET($api);
        $I->wantTo('Check response Time for this Api');
        $I->DisplayResponse($data);;
        // $I->getOrderListData($data);
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->seeResponseJsonMatchesJsonPath('$.data.BALANCE');
        $I->seeResponseJsonMatchesJsonPath('$.data.TOTAL_INCOME');
        $I->seeResponseJsonMatchesJsonPath('$.data.CANWITHDRAWALS');
        $I->dontSeeResponseContainsJson(['code' => 401]);
        $I->dontSeeResponseContainsJson(['data' => null]);
        // $I->CheckResponseTimeEquals($data);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
    }
}
