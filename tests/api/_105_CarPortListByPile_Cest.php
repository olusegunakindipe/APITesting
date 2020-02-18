<?php 

class _105_CarPortListByPile_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function CarportListByPile(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check data presence in the API');
        $page = 1;
        $size = 20;
        $urlParams = [
            $page,
            $size
        ];
        $api = "/Carport/ListByPile/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->wantTo('check Carport alert data');
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->seeResponseJsonMatchesJsonPath('$.data...CHARGING_PILE_SN');
        $I->seeResponseJsonMatchesJsonPath('$.data...CHARGING_PILE_STATE');
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200); 
    }
}
