<?php 

class _14_PileOrder_ListCurrerntBy_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function ListCurrentBy(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the some data are present in the API');
        $page = 1;
        $size = 20;
        $urlParams = [
            $page,
            $size
        ];
        $api = "/PileOrder/ListCurrentBy/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->grabResponse();
        // $I->CheckPresence($data);
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->seeResponseJsonMatchesJsonPath('$.data...USER_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data...CHARGE_ORDER_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data...MOBILE_PHONE');
        $I->seeResponseJsonMatchesJsonPath('$.data...CARD_NO');
        $I->seeResponseJsonMatchesJsonPath('$.data.pageInfo.total');
        $I->dontSeeResponseCodeIs(404);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200); 
    }
}
