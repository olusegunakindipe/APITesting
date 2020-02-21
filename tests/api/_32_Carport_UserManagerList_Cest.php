<?php 

class _32_Carport_UserManagerList_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function UserManagerList(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Get spme fields in this api');
        $startDate = '2020-01-07';
        $endDate = '2020-02-07';
        $page = 1;
        $size = 20;
        $urlParams = [
            $startDate,
            $endDate,
            $page,
            $size
        ];
        $api = "/Carport/UserManagerList/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->DisplayResponse($data);
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        // $I->GetUserManagerList($data);
        $I->seeResponseJsonMatchesJsonPath('$.data.data.[0].USER_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data.data.[0].CELL_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data.data.[0].MOBILE_PHONE');
        $I->seeResponseJsonMatchesJsonPath('$.data.data.[0].CREATE_TIME');
        $I->seeResponseJsonMatchesJsonPath('$.data.pageInfo.pageTotal');
        $I->dontSeeResponseContainsJson(['code' => 401]);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
