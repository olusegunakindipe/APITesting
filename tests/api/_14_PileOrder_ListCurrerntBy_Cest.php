<?php 

class _14_PileOrder_ListCurrerntBy_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    Public function ListCurrentBy(ApiTester $I)
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
        $I->dontSeeResponseCodeIs(404);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200); 
    }
}
