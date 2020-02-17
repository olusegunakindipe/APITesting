<?php 

class _51_Carport_GetwhiteListCest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function CarportGetWhiteList(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('check json data presence');
        $id = 23;
        $urlParams = [
            $id
        ];
        $api = "/Carport/GetWhiteList/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->wantTo('Check response Time for this Api');
        $I->SeeResponseMatchesJsonType(['data'=>[
            'ID'=> 'string',
            'model_no' => 'string',
            'NICK_NAME' => 'string',
            'CREATE_USER_ACCOUNT' => 'string',
            'USER_STATE'=> 'string',
            'CARD_NO' => 'string|null'
            ]
        ]);
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->DisplayResponse($data);
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }

}
