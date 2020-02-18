<?php 

class _44_User_GetUserOrder_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function UserGetUserOrder(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('check possible data in the API record corresponding');
        $id = '100000228124';
        $page = 1;
        $size = 20;
        $urlParams = [
            $id,
            $page,
            $size,
        ];
        $api = "/User/GetUserOrder/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->wantTo('check if the data returned json');
        // $I->GetUserData($data);
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->seeResponseJsonMatchesJsonPath('$.data...CHARGE_ORDER_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data...CELL_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data...LOCATION');
        $I->seeResponseJsonMatchesJsonPath('$.data...CELL_NAME');
        $I->dontSeeResponseContainsJson(['data' => 'Invalid currenpage']);
        $I->dontSeeResponseContainsJson(['data' => 'Invalid pageSize']);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200); 
    }
}

