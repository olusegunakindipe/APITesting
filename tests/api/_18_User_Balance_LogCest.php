<?php 

class _18_User_Balance_LogCest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function UserManagerList(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Get the response Time of ToolMenuApi');
        $I->sendGET('User/BalanceLog/2019-02-07/2020-02-07/1/20');
        $I->wantTo('PrintOut the response and peak Time');
        $data = $I->grabDataFromResponseByJsonPath('debug');
        echo "Response Time is:";
        print_r($data[0]['time']);
        echo "Peak Time:"; //This is response Time
        print_r($data[0]['peak']); //This is the peak time
        //  print_r($data);
        $I->CheckResponseTimeEquals($data);
        $I->CheckDataIsEmpty($data);
        $I->seeResponseContainsJson(['total' => 0]);
        $I->CheckResponseTimeEquals($data);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200); 
    }
}
