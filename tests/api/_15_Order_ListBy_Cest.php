<?php 

class _15_Order_ListBy_Cest
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
        $data = $I->sendGET('Order/ListBy/top/2019-02-07/2020-02-07/1/20');
        $I->wantTo('Check response Time for this Api');
        $I->TestData($data);
        $I->seeResponseContainsJson([ 
            'CHARGE_ORDER_ID' => 'CO20190409011533143cb6d874f4bc49',
            'USER_ID' => '100000071899',
            'CELL_ID' => '4413020005',
            'CREATE_TIME' => '2019-04-09 01:15:33',
            'END_INFO' => '充电时间到期'
            ]
        );
       
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
    }
}
