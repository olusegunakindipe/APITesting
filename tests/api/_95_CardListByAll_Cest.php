<?php 

class _95_CardListByAll_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }
    public function CardListByAll(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check data are correct');
        $page = 1;
        $size = 20;
        $urlParams = [
            $page,
            $size
        ];
        $api = "/Card/ListByAll/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->wantTo('Get response time');
        $I->DisplayResponse($data);
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->seeResponseJsonMatchesJsonPath('$.data...CARD_NO');
        $I->seeResponseJsonMatchesJsonPath('$.data...USER_ID');
        $I->dontSeeResponseContainsJson(['data' => 'invalid currentPage']);
        // $I->TestPackageSystemStop($data);
        $I->seeResponseIsJson(); 
        $I->dontSeeResponseCodeIs(401); 
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
