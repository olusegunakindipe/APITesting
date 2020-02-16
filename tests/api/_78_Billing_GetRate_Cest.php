<?php 

class _78_Billing_GetRate_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function BillingGet(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the some data are present in the API');
        $id = 1682;
        $urlParams = [
            $id
        ];
        $api = "/Billing/GetRate/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->wantTo('Get the data');
        $I->GetBillingDataRate($data);
        $I->seeResponseIsJson(); 
        $I->dontseeResponseCodeIs(401);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
