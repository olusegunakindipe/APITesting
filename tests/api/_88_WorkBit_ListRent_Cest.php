<?php 

class _88_WorkBit_ListRent_Cest
{
    public function _before(ApiTester $I)
    {
    }


    public function WorkBitListRent(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the some data are present in the API');
        $page = 1;
        $size = 20;
        $urlParams = [
            $page,
            $size
        ];
        $api = "/WorkBit/ListByBisRent/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        // $I->TestWorkBitListRent($data);
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->seeResponseJsonMatchesJsonPath('$.data...NAME');
        $I->seeResponseJsonMatchesJsonPath('$.data...BIS_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data...RENT_NO');
        $I->seeResponseJsonMatchesJsonPath('$.data...UPDATE_TIME');
        $I->dontSeeResponseCodeIs(401); 
        $I->seeResponseIsJson(); 
        $I->seeResponseCodeIs(200); 
    }
}
