<?php 

class _68_Property_GetById_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function PropertyGetById(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('check possible data in the API record corresponding');
        $id = 893;;
        $urlParams = [
            $id,
        ];
        $api = "/Property/GetById/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->DisplayResponse($data);
        $I->dontSeeResponseCodeIs(401);
        $I->seeResponseIsJson();
        $I->SeeResponseMatchesJsonType(['data' => 
            [
                'ID' => 'string',
                'PROPERTY_ID' => 'string',
                'PROPERTY_ACCOUNT' => 'string',
                'PROPERTY_TELPHONE' => 'string',
                "STATUS" => "string",
                "SALT" => 'null'
            ]
        ]);
        $I->dontSeeResponseContainsJson(['code' => 401]);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
    }
}
