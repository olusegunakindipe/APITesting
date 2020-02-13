<?php 

class _12_FlatComplex_ListByWhite_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function FlatComplexListBy(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the data from the API is returning empty');
        $data = $I->sendGET('FlatComplex/ListByWhite/1/20');
    //  $data = $I->grabDataFromResponseByJsonPath('debug');
        $I->DisplayResponse($data);
        $I->grabResponse();
        $I->CheckForEmptiness($data);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
    }
    
}
