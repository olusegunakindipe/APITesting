<?php 

class _99_SystemListByUploadHistory_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function SystemListByUploadHistory(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the some data are present in the API');
        $page = 1;
        $size = 20;
        $urlParams = [
            $page,
            $size
        ];
        $api = "/System/ListByUploadHistory/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        // $I->TestWorkBitListRent($data);
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->seeResponseJsonMatchesJsonPath('$.data...CREATE_ACCOUNT');
        $I->seeResponseJsonMatchesJsonPath('$.data...UPLOAD_TIME');
        $I->seeResponseJsonMatchesJsonPath('$.data...UPLOAD_STATE');
        $I->dontSeeResponseCodeIs(401); 
        $I->seeResponseIsJson(); 
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
