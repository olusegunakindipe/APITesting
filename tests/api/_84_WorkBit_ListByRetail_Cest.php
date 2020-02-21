<?php 

class _84_WorkBit_ListByRetail_Cest
{
    public function _before(ApiTester $I)
    {
    }
    
    public function WorkBitListRetail(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the some data are present in the API');
        $page = 1;
        $size = 20;
        $urlParams = [
            $page,
            $size
        ];
        $api = "/WorkBit/ListByBisRetail/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->grabResponse();
        $I->dontSeeResponseCodeIs(401);
        // $I->TestWorkBitRetailData($data);
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].NAME');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].BI_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].SPLIT_TYPE');
        $I->seeResponseJsonMatchesJsonPath('$.data.pageInfo.total');
        $I->seeResponseIsJson(); 
        $I->seeResponseCodeIs(200); 
    }
}
