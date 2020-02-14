<?php 

class _79_FlatComplex_ListBySite_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function FlatComplex_ListBySite(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the some data are present in the API');
        $data = $I->sendGET('/FlatComplex/ListBySiteByCell/3505050019');
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->FlatComplexData($data);
        $I->seeResponseIsJson(); 
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
