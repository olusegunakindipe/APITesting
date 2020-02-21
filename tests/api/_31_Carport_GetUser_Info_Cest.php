<?php 

class _31_Carport_GetUser_Info_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function CarPortUser(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('check possible data in the API record corresponding');
        $startDate = "2020-01-07";
        $endDate = "2020-02-07";
        $page = 1;
        $size = 20;
        $urlParams = [
            $startDate,
            $endDate,
            $page,
            $size
        ];
        $api = "/Carport/GetUserInfo/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->DisplayResponse($data);
        // $I->CheckUserInfo($data);
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->seeResponseJsonMatchesJsonPath('$.data..newUser');
        $I->seeResponseJsonMatchesJsonPath('$.data...buyUser');
        $I->seeResponseJsonMatchesJsonPath('$.data...arpuIncomeNum');
        $I->seeResponseMatchesJsonType(['data' =>
            [
                'newUser' => 'string',
                'buyUser' => 'string',
                'totalUser' => 'string'
            ]
        ]);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
    }
}
