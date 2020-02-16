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

    public function Order_List(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('check if data is accurate');
        $page = 1;
        $size = 20;
        $urlParams = [
            $page,
            $size
        ];
        $api = "/WorkBit/ListByUserWithdraw/";
        $fullPath = $api . join("/", $urlParams);
        $data = $I->sendGET($fullPath);
        $I->wantTo('Check response Time for this Api');
        $I->DisplayResponse($data);;
        // $I->getOrderListData($data);
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].WITHDRAW_NO');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].WITHDRAW_FEE');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].PAY_FEE');
        $I->dontSeeResponseContainsJson(['data' => 'invalid page']);
        $I->dontSeeResponseContainsJson(['data' => 'invalid size']);
        $I->CheckResponseTimeEquals($data);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
    }
}
