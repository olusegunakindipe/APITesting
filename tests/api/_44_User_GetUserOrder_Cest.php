<?php 

class _44_User_GetUserOrder_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function UserGetUserOrder(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('check possible data in the API record corresponding');
        $page = 1;
        $size = 20;
        $id = '100000056848';
        $urlParams = [
            $page,
            $size,
            $id
        ];
        $api = "/User/GetUserOrder/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->wantTo('check if the data returned json');
        // $I->GetUserData($data);
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->dontSeeResponseContainsJson(['data' => 'Invalid currenpage']);
        $I->dontSeeResponseContainsJson(['data' => 'Invalid pageSize']);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->seeResponseCodeIs(200); 
    }
}

