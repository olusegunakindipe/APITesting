<?php 

class _04_SearchES_Stat_Hq_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function SearchES(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Get the ID and Matching fields in SearchES');
        $I->haveHttpHeader('accept', 'application/json');
        $I->haveHttpHeader('Content-Type', 'application/json');
        $startDate = '2020-01-07';
        $endDate = '2020-02-05';
        $urlParams = [
            $startDate,
            $endDate
        ];
        $api = "/SearchES/Stat/hq/top/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        //$I->CheckVariousData($data);
        $I->DisplayResponse($data); //This is response Time
        // What is this different with response code 200? by ira 
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->seeResponseJsonMatchesJsonPath('$.data.log[0].cost_fee');
        $I->seeResponseJsonMatchesJsonPath('$.data.log[0].degree');
        $I->seeResponseJsonMatchesJsonPath('$.data.log[0].total_count');
        $I->dontSeeResponseCodeIs(401);
        $I->grabResponse();
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);   
    }
}
