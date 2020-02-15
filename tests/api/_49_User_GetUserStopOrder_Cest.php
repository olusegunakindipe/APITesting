<?php 

class _49_User_GetUserStopOrder_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function UserGetUserStopPackage(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('check possible data in the API record corresponding');
        $page = 1;
        $size = 20;
        $id = '100000049408';
        $urlParams = [
            $page,
            $size,
            $id
        ];
        $api = "/User/GetUserStopOrder/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->DisplayResponse($data);
        // $I->CheckUserStopPackage($data);
        $I->dontSeeResponseCodeIs(404);
        $I->seeResponseIsJson();
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
