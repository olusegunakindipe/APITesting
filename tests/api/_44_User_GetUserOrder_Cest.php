<?php 

class _44_User_GetUserOrder_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function UserGetUserOrder(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('check possible data in the API record corresponding');
        $data=$I->sendGET('User/GetUserOrder/100000056848/1/20/');
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->wantTo('check if the checkUser Order Data');
        $I->seeResponseContainsJson(['total' => 34, 'pageTotal'=>2, 'size'=>20]);
        $I->seeResponseContainsJson([
            'CHARGE_ORDER_ID' => 'CO20190529195944a5391e5f27d43e2a',
            'CELL_ID' => '4601050002',
            "FEE" => "1.0000",
            'USER_ID' => '100000056848',
            'CHARGING_PILE_SN' => '359369082031259'
        ]);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->seeResponseCodeIs(200); 
    }
}

