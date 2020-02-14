<?php 

class _53_Carport_ListByRechange_Cest
{
    public function _before(ApiTester $I)
    {
    }
    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function CarportListByRechange(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the some data are present in the API');
        $data = $I->sendGET('/Carport/ListByRechange/2019-02-11/2020-02-11/1/20');
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->wantTo('check if the correctness of data');
        $I->seeResponseContainsJson(['total' => 484, 'pageTotal'=>25, 'size'=>20]);
        $I->SeeResponseContainsJson(['data' => [
            "ID" => "317120",
            "RECHARGE_ORDER_ID"=>"YANCP202002090450051933506935",
            "ORDER_TYPE" =>"1",
            "USER_ID" => "100000213832",
            "MOBILE_PHONE" => "18382312876"
        ]]);
        $I->SeeResponseContainsJson(['query' => 2]);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200); 
    }
}
