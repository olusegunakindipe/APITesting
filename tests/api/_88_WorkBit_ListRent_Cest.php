<?php 

class _88_WorkBit_ListRent_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function WorkBitListRent(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the some data are present in the API');
        $data = $I->sendGET('/WorkBit/ListByBisRent/1/20');
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->seeResponseContainsJson([
            'RENT_NO'=> 'RU165604840858223616',
            'TYPE' => 0,
            'RENT_PRICE' => '3.0000',
            'RENT_NUM' => 9394,
            'PAY_FEE' => '28182.0000',
            'CREATE_TIME'=> '2020-01-02 22:18:03'
        ]);
        $I->seeResponseContainsJson(['total' => 50, 'pageTotal'=>3]);
        $I->dontSeeResponseCodeIs(401); 
        $I->seeResponseIsJson(); 
        $I->seeResponseCodeIs(200); 
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
