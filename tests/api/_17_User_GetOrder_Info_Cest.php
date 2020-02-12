<?php 

class _17_User_GetOrder_Info_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function UserGetOrderInfo(ApiTester $I) {

        $I->AdminLogin();
        $I->wantTo('Get the Matching fields in the List');
        $I->haveHttpHeader('accept', 'application/json');
        $I->seeHttpHeader('Content-Type','application/json');
        $data = $I->sendGET('User/GetOrderInfo/2019-02-07/2020-02-07');

        $I->dontSeeResponseContainsJson(['code' => 401]);
        // it can match tree-like structures as well
        $I->wantTo('get if data is accurate as specified on the Api');
        $I->CheckDataIsCorrect($data);
   
         $I->grabResponse();
         $I->DisplayResponse($data);
        //  $I->CheckResponseTimeEquals();
        // $I->CheckId();
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200); 
    }
}
