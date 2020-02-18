<?php 

class _77_Billing_ListRateBy_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function CarportGet(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the some data are present in the API');
        $page = 1;
        $size = 20;
        $urlParams = [
            $page,
            $size
        ];
        $api = "/Billing/ListRateBy/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        // $I->TestBillingData($data);
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].STRATEGY_RATE_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].CELL_NAME');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].SITE_ID');
        $I->seeResponseIsJson(); 
        $I->dontseeResponseCodeIs(401);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
