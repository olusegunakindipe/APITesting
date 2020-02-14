<?php 

class _86_WorkBit_ListFran_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function WorkBitListFran(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the some data are present in the API');
        $data = $I->sendGET('/WorkBit/ListByBisFran/1/20');
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->dontSeeResponseMatchesJsonType([
            'data' => [
                'FRAN_TYPE_NO' => 'string',
                'BI_ID' => 'integer',
                'NAME' => 'string|null',
                'FRAN_COST' => 'string',
                'CREATE_TIME' => 'string',
                'FRAN_CHARGE' => 'float'
            ]
        ]);
        $I->seeResponseContainsJson(['total' => 456, 'pageTotal'=>23]);
        $I->seeResponseContainsJson(['FRAN_COST' => '首年50% 、次年50%']);
        $I->seeResponseIsJson(); 
        $I->seeResponseCodeIs(200); 
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
