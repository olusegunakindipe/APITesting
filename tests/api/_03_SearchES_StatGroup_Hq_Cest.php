<?php 

class _03_SearchES_StatGroup_Hq_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }
    public function SearchES(ApiTester $I) 
    {
        $I->AdminLogin();
        $I->wantTo('Get the ID and Matching field in SearchES');
        $startDate = '2020-01-07';
        $endDate = '2020-02-07';
        $urlParams = [
            $startDate,
            $endDate
        ];
        $api = "/SearchES/StatGroup/hq/top/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->wantTo('print response Time for this Api');
        $I->DisplayResponse($data); //This is response Time
        $I->grabResponse();
        // $I->CheckId($data);
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->seeResponseJsonMatchesJsonPath('$.data[0].value');
        $I->dontSeeResponseCodeIs(401);
        $I->wantTo('Check if response returns Json');
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);   
    }
      
}
