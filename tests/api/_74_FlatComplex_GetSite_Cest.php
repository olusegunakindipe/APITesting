<?php 

class _74_FlatComplex_GetSite_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function PropertyListBy(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the some data are present in the API');
        $id ='341881000120200117113317';
        $urlParams = [
            $id
        ];
        $api = "/FlatComplex/GetSite/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->GetProperty($data);
        $I->seeResponseMatchesJsonType([
            'data' => [
                'SITE_ID' => 'string',
                'CELL_EMAIL' => 'string|null',
                'CELL_ID' => 'string'
            ]
        ]);
        $I->seeResponseIsJson(); 
        $I->dontSeeResponseCodeIs(401);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
