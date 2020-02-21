<?php 

class _45_User_GetUserPackage_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function UserGetUserPackage(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('check possible data in the API record corresponding');
        $id = '100000157254';
        $page = 1;
        $size = 20;
        $urlParams = [
            $id,
            $page,
            $size,
        ];
        $api = "/User/GetUserPackage/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->wantTo('check if the data is empty');
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->grabResponse();
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->dontSeeResponseContainsJson(['data' => 'Invalid pageSize']);
        $I->seeResponseJsonMatchesJsonPath('$.data...PACKAGE_ORDER_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data...STATE');
        $I->seeResponseJsonMatchesJsonPath('$.data...PAY_TYPE');
        $I->seeResponseJsonMatchesJsonPath('$.data.pageInfo.pageTotal');
        $I->wantTo('check if data returned json');
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
    }
}
