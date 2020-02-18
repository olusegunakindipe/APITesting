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
        $id = $I->grabDataFromResponseByJsonPath('$.data.data[0].USER_ID');
        $id = $I->grabDataFromResponseByJsonPath('$.data.data[0].MOBILE_PHONE');
        $id = $I->grabDataFromResponseByJsonPath('$.data.data[0].BALANCE');
        $id = $I->grabDataFromResponseByJsonPath('$.data.data[0].CELL_ID');
        $I->dontSeeResponseCodeIs(401);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
        // still test one year
    }
}
