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

    public function UserBalanceLog(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Get the data in this API');
        $startDate= "2020-01-07";
        $endDate = "2020-02-07";
        $page = 1;
        $size = 20;
        $urlParams = [
            $startDate,
            $endDate,
            $page,
            $size
        ];
        $api = "/User/BalanceLog/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->wantTo('PrintOut the response and peak Time');
        $data = $I->grabDataFromResponseByJsonPath('debug');
        echo "Response Time is:"; //Response Time
        print_r($data[0]['time']);
        echo "Peak Time:"; 
        print_r($data[0]['peak']); //This is the peak time
        $I->CheckResponseTimeEquals($data);
        $I->CheckUsereBalanceData($data);
        $I->CheckResponseTimeEquals($data);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200); 
    }
}
