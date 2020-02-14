<?php 

class _66_FlatComplex_ListBy_Cest
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
        $I->wantTo('check if data is accurate');
        $data = $I->sendGET('FlatComplex/ListBy/1/20');
        $I->wantTo('Check response Time for this Api');
        $I->DisplayResponse($data);
        $I->checkFlatComplexList($data);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
    }
}
