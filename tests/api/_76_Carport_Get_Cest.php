<?php 

class _76_Carport_Get_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function CarportGet(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the some data are present in the API');
        $id = '510107000520200113032712';
        $urlParams = [
            $id
        ];
        $api = "/Carport/Get/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        // $I->CarportGetData($data);
        $I->dontSeeResponseContainsJson(['data' => 'invalid argument']);
        $I->seeResponseJsonMatchesJsonPath('$.data.CARPORT_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data.CARPORT_NAME');
        $I->seeResponseIsJson(); 
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
