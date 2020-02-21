<?php 

class _42_User_GetUserPackageList_Cest
{

    public function _before(ApiTester $I)
    {
    }

    public function UserGetUserPackageList(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('check possible data in the API record corresponding');
        $page = 1;
        $size = 20;
        $id = '100000039429';
        $urlParams = [
            $id,
            $page,
            $size            
        ];
        $api = "/User/GetUserPackageList/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->wantTo('check json data');
       
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->seeResponseJsonMatchesJsonPath('$.data...ID');
        $I->seeResponseJsonMatchesJsonPath('$.data...PACKAGE_TYPE');
        $I->seeResponseJsonMatchesJsonPath('$.data...DURATION');
        $I->dontSeeResponseContainsJson(['data' => 'invalid page']);
        $I->dontSeeResponseContainsJson(['data' => 'invalid size']);
        // $I->grabResponse();
        // $I->CheckResponseTimeEquals($data);
        $I->dontSeeResponseContainsJson(['data' => 401]);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
    }
}
