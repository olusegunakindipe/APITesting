<?php 

class _32_Carport_UserManagerList_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
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
        $I->GetUserManagerList($data);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200); 
    }
}
