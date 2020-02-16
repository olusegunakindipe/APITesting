<?php 

class _42_User_GetUserPackageList_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function UserGetUserPackageList(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('check possible data in the API record corresponding');
        $page = 1;
        $size = 20;
        $id = '100000227661';
        $urlParams = [
            $page,
            $size,
            $id
        ];
        $api = "/User/GetUserPackageList/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->wantTo('check json data');
        // $I->CheckDataFlatComplex($data);
        // $I->wantTo('Get response is empty');
        // $I->CheckForEmptiness($data);
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->dontSeeResponseContainsJson(['data' => 'invalid page']);
        $I->dontSeeResponseContainsJson(['data' => 'invalid size']);
        // $I->grabResponse();
        // $I->CheckResponseTimeEquals($data);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
    }
}
