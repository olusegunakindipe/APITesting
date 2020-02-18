<?php 

class _69_FlatComplex_Get_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function FlatComplexGet(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('check possible data in the API record corresponding');
        $id = '5101040001';
        $urlParams = [
            $id 
        ];
        $api = "/FlatComplex/Get/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->DisplayResponse($data);
        $I->dontSeeResponseCodeIs(401);
        // $I->GetFlatComplexData($data);
        $I->SeeResponseMatchesJsonType(['data' => 
            [
                'CELL_ID'=> 'string',
                'CELL_NAME'=> 'string',
                'LOCATION'=> 'string',
                'NATURE'=> 'string',
                'GPS_LNG' => 'string'
            ]
        ]);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
    }
}
