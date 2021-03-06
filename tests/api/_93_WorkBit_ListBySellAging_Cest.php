<?php 

class _93_WorkBit_ListBySellAging_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function WorkBitListBySaellAging(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the some data are present in the API');
        $page = 1;
        $size = 20;
        $urlParams = [
            $page,
            $size
        ];
        $api = "/WorkBit/ListBySellAging/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        // $I->TestWorkBitListRent($data);
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->seeResponseJsonMatchesJsonPath('$.data...AGING_TIME');
        $I->seeResponseJsonMatchesJsonPath('$.data...AGING_FEE');
        $I->seeResponseJsonMatchesJsonPath('$.data...TOTAL_AGING_FEE');
        $I->seeResponseJsonMatchesJsonPath('$.data...CREATE_USER_ACCOUNT');
        $I->seeResponseJsonMatchesJsonPath('$.data.pageInfo.total');
        $I->dontSeeResponseCodeIs(401); 
        $I->seeResponseIsJson(); 
        $I->seeResponseCodeIs(200); 
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
