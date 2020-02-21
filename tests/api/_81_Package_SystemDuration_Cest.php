<?php 

class _81_Package_SystemDuration_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function PackageSystem(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the some data are present in the API');
        $page = 1;
        $size = 20;
        $urlParams = [
            $page,
            $size
        ];
        $api = "/Package/SystemDurationListBy/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].PACKAGE_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].POWER_TYPE_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].STATE');
        $I->seeResponseJsonMatchesJsonPath('$.data.pageInfo.total');
        $I->seeResponseIsJson(); 
        $I->dontSeeResponseCodeIs(401); 
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
