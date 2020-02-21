<?php 

class _08_User_UserManagerList_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function UserManagerList(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Get the get usermenu data');
        $startDate = '2019-12-20';
        $endDate = '2020-01-20';
        $page = 1;
        $limit = 20;
        $urlParams = [

            $startDate,
            $endDate,
            $page,
            $limit
        ];
        $api = "/User/UserManagerList/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->DisplayResponse($data); //This is response Time
        // $I->checkUserManagerData($data);
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].USER_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].MOBILE_PHONE');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].BALANCE');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].CELL_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data.pageInfo.total');
        $I->dontSeeResponseCodeIs(401);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
        // still test one year
    }
}
