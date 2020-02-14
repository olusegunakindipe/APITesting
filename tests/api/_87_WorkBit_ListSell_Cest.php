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
        $I->dontSeeResponseMatchesJsonType([
            'data' => [
                'SELL_NO' => 'string',
                'BI_ID' => 'integer',
                'NAME' => 'string|null',
                'FLOOR_FEE'=> 'string|null',
                'FRAN_COST' => 'string',
                'MAINTEN_FEE' => 'float',
            ]
        ]);
        $I->seeResponseContainsJson(['total' => 222, 'pageTotal'=>12]);
        $I->dontSeeResponseCodeIs(401); 
        $I->seeResponseIsJson(); 
        $I->seeResponseCodeIs(200); 
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
