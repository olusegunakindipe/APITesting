<?php 

class _35_Carport_Feedback_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function CarPortFeedBack(ApiTester $I) 
    {
        $I->AdminLogin();
        $I->wantTo('Get to the data in the List');
        $startDate = "2020-01-07";
        $endDate = "2020-02-07";
        $page = 1;
        $size = 20;
        $urlParams = [
            $startDate,
            $endDate,
            $page,
            $size
        ];
        $api = "/Carport/Feedback/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->haveHttpHeader('accept', 'application/json');
        $I->seeHttpHeader('Content-Type', 'application/json');
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->DisplayResponse($data);
        $I->grabResponse();
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].ID');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].AREA');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].CELL_NAME');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].CELL');
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
    }
}
