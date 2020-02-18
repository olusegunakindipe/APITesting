<?php 

class _06_Info_ListBy_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function InfoListBy(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('See if response contains Json');
        $startDate = '2020-01-07';
        $endDate = '2020-02-07';
        $page = 1;
        $limit = 20;
        $urlParams = [
            
            $startDate,
            $endDate,
            $page,
            $limit
        ];
        $api = "/Info/ListBy/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->DisplayResponse($data); //This is response Time
        $I->wantTo('see if response contains json');
        $I->seeResponseIsJson();
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].ID');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].TOPIC_CONTENT');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].TOPIC_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].CREATE_USER_ACCOUNT');
        $I->dontSeeResponseContainsJson(['code' => 401]);
        $I->seeResponseContains('data');
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        // no any spec test
    }
}
