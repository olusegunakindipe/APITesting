<?php 

class _82_Package_SystemStopListBy_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function PackageSystemStop(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check data are correct');
        $page = 1;
        $size = 20;
        $urlParams = [
            $page,
            $size
        ];
        $api = "/Package/SystemStopListBy/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->wantTo('Get response time');
        $I->DisplayResponse($data);
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->seeResponseJsonMatchesJsonPath('$.data...PACKAGE_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data...SYS_DURATION_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data...DESCRIPTION');
        $I->seeResponseJsonMatchesJsonPath('$.data...CELL_NAME');
        $I->seeResponseIsJson(); 
        $I->dontSeeResponseCodeIs(401); 
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
