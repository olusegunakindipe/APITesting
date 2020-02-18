<?php 

class _108_PackageGetSystemStopInfo_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function GetSystemStopInfo(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check data presence in the API');
        $id = 202;
        $urlParams = [
            $id
        ];
        $api = "/Package/GetSystemStopInfo/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->dontSeeResponseContainsJson(['data' => null]);
        $I->dontSeeResponseContainsJson(['code' => 404]);
        $I->dontSeeResponseContainsJson(['data' => 'invalid page']);
        $I->dontSeeResponseContainsJson(['data' => 'invalid size']);
        $I->seeResponseJsonMatchesJsonPath('$.data.PACKAGE_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data.PAY_MONEY');
        $I->seeResponseJsonMatchesJsonPath('$.data.CAR_TYPE_NAME');
        $I->dontSeeResponseCodeIs(401);
        $I->seeResponseIsJson(); 
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
