<?php 

class _87_WorkBit_ListSell_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function WorkBitListSell(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the some data are present in the API');
        $data = $I->sendGET('/WorkBit/ListByBisSell/1/20');
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->SeeResponseMatchesJsonType([
            'debug' => [
                'time' => 'float',
                'peak' => 'float',
                'query' => 'integer',
                'cache'=> 'integer',
            ]
        ]);
        $I->dontSeeResponseCodeIs(401); 
        $I->seeResponseIsJson(); 
        $I->seeResponseCodeIs(200); 
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
