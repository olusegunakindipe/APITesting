<?php 

class _54_Carport_ListByRefund_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function CarportListByRefund(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the some data are present in the API');
        $data = $I->sendGET('/Carport/ListByRefund/2019-02-11/2020-02-11/1/20');
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->CheckAccount($data);
        $I->seeResponseContainsJson([
            'ID' => 224,
            'TYPE'=> 1,
            'REFUND_ORDER_NO'=>'RF20191230091257319',
            'USER_ID' => '100000094025',
            'CELL_ID' => '1304290002',
            'CREATE_TIME' => '2019-12-30 09:55:57.380',
            'ORDER_NO' => 'OSXHS2019121119260253286574',
        ]);
        $I->SeeResponseContainsJson(['code' => 200]);
        $I->seeResponseIsJson(); 
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
