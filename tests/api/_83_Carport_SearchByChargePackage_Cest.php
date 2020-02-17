<?php 

class _83_Carport_SearchByChargePackage_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function CarportSearchBy(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the some data are present in the Api');
        $id = '350104000320190411095938';
        $urlParams = [
            $id
        ];
        $api = "/Carport/SearchByChargePackage/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->wantTo('Get json response');
        // $I->GetCarportSearch($data);
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->dontSeeResponseContainsJson(['data' => 'invalid argument']);
        $I->seeResponseIsJson(); 
        $I->dontSeeResponseCodeIs(401); 
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
