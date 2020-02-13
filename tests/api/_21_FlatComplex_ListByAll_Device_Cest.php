<?php 

class _21_FlatComplex_ListByAll_Device_Cest
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
        $I->sendGET('FlatComplex/ListByAllDevice/1/20');
        $I->wantTo('Check response Time for this Api');
        $data = $I->grabDataFromResponseByJsonPath('debug');
        echo "Response Time is:";
        print_r($data[0]['time']);
        $I->wantTo('Check if response Time is contained in this Api');
        $I->seeResponseContainsJson(array('time' => $data[0]['time']));
    //  $I->CheckForEmptiness();
    //  $I->CheckResponseTimeEquals();  
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
    }
}
