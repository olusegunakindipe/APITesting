<?php 

class _71_Project_ListBy_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function ProjectListBy(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the some data are present in the API');
        $page = 1;
        $size = 20;
        $urlParams = [
            $page,
            $size
        ];
        $api = "/Project/ListBy/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        // $I->checkForData($data);
        $I->wantTo('check if the data corresponds');  
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].CONTRACT_CODE');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].CIID');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].ACTUAL_PORT_COUNT');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].ELECTRICITY_NUMBER');
        $I->seeResponseIsJson(); 
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
