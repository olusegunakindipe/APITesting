<?php 

class _09_User_UserGetInfo_Cest
{
    public function _before(ApiTester $I)
    {
    }
    
    public function UserGetInfo(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the data are correctly stored');
        $startDate = '2020-01-07';
        $endDate = '2020-02-07';
        $urlParams = [
            $startDate,
            $endDate
        ];
        $api = "/User/GetUserInfo/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->grabResponse();
        // $I->CheckDetail($data);
        $I->DisplayResponse($data);
        $I->seeResponseJsonMatchesJsonPath('$..data.newUser');
        $I->seeResponseJsonMatchesJsonPath('$..data.totalUser');
        $I->seeResponseJsonMatchesJsonPath('$..data.buyUser');
        $I->seeResponseJsonMatchesJsonPath('$..data.arpuIncome');
        $I-> seeResponseMatchesJsonType(['data' =>
            [
                'newUser' => 'string',
                'totalUser' => 'string',
                'buyUser' => 'string',
                'arpuIncome' => 'string'
            ]
        ]);
        $I->seeResponseIsJson();
        $I->dontSeeResponseCodeIs(401);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        // still check "data" only
    }
}
