<?php 

class _107_Package_SystemDurationGet_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function PackageSystemDuration(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the some data are present in the API');
        $id = '4601070005100240';
        $urlParams = [
            $id
        ];
        $api = "/Package/SystemDurationGet/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->grabResponse();
        $I->dontSeeResponseCodeIs(401);
        // $I->TestWorkBitRetailData($data);
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->seeResponseJsonMatchesJsonPath('$.data.PACKAGE_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data.CELL_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data.DURATION');
        $I->seeResponseIsJson(); 
        $I->seeResponseCodeIs(200); 
    }
}
