<?php 

class _48_User_GetUserStopPackage_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function UserGetUserStopPackage(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('check possible data in the API record corresponding');
        $id = '100000213098';
        $page = 1;
        $size = 20;;
        $urlParams = [
            $id,
            $page,
            $size,
            
        ];
        $api = "/User/GetUserStopPackage/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->DisplayResponse($data);
        $I->dontSeeResponseCodeIs(400);
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].ID');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].PACKAGE_ORDER_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].USER_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].CARPORT_NAME');
        $I->dontSeeResponseContainsJson(['data' => 'invalid page']);
        $I->dontSeeResponseContainsJson(['data' => 'invalid size']);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200); 
    }
}
