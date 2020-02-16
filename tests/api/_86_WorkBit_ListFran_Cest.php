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
        $page = 1;
        $size = 20;
        $urlParams = [
            $page,
            $size
        ];
        $api = "/WorkBit/ListByBisFran/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->dontSeeResponseMatchesJsonType([
            'data' => [
                'FRAN_TYPE_NO' => 'string',
                'BI_ID' => 'null',
                'NAME' => 'integer|null',
                'FRAN_COST' => 'null',
                'CREATE_TIME' => 'null',
                'FRAN_CHARGE' => 'float'
            ]
        ]);
        $I->seeResponseIsJson(); 
        $I->seeResponseCodeIs(200); 
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
