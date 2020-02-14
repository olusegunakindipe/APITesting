<?php 

class _69_FlatComplex_Get_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function FlatComplexGet(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('check possible data in the API record corresponding');
        $data=$I->sendGET('/FlatComplex/Get/5101040001');
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->DisplayResponse($data);
        $I->dontSeeResponseCodeIs(401);
        $I->seeResponseIsJson();
        $I->SeeResponseContainsJson([
            'CELL_ID' => '5101040001',
            'CELL_DISTRICT_CODE' => '510104',
            'CELL_TELEPHONE' => '13540106518'
        ]);
        $I->SeeResponseMatchesJsonType(['code' => 'integer']);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
    }
}
