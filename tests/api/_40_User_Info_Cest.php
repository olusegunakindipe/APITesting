<?php 

class _40_User_Info_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function UserInfo(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('check possible data in the API record corresponding');
        $id = '100000227661';
        $urlParams = [
            $id
        ];
        $api = "/User/Info/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->DisplayResponse($data);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->wantTo('check if the data contains data');
        $I->seeResponseJsonMatchesJsonPath('$.data...USER_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data...CREATE_TIME');
        // $I->CheckUserData($data);
        $I->dontSeeResponseCodeIs(401);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
    }
}
