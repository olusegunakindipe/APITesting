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
        // dont use hard code to check data.
        // $I->getOrderListData($data);
        $I->CheckResponseTimeEquals($data);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
    }
}