<?php 

class _34_Carport_ListByAll_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function CarportListByAll(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the some data are present in the API');
        $data = $I->sendGET('Carport/ListByAll');
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        // $I->CheckValueIsOk($data);
        $I->seeResponseJsonMatchesJsonPath('$.data[0].CARPORT_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data[0].CARPORT_NAME');
        $I->seeResponseJsonMatchesJsonPath('$.debug.time');
        $I->seeResponseJsonMatchesJsonPath('$.debug.peak');
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200); 
    }
}
