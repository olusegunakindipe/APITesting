<?php 

class _26_FlatComplex_ListAllPort_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {

    }

    public function FlatComplexListAllPort(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the data is correct');
        $page = 1;
        $size = 20;
        $urlParams = [
            $page,
            $size
        ];
        $api = "/FlatComplex/ListByAllPort/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->wantTo('check if the data are of specfic value');
        // $I->checkFlatComplexListData($data);
        $I->dontSeeResponseCodeIs(401);
        $I->seeResponseCodeIs(200);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
