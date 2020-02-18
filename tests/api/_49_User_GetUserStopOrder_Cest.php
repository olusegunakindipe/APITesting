<?php 

class _49_User_GetUserStopOrder_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function UserGetUserStopOrder(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('check possible data in the API record corresponding');
        $page = 1;
        $size = 20;
        $id = '100000194423';
        $urlParams = [
            $id,
            $page,
            $size            
        ];
        $api = "/User/GetUserStopOrder/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->DisplayResponse($data);
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        // $I->CheckUserStopPackage($data);
        $I->seeResponseJsonMatchesJsonPath('$.data...USER_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data...VEHICLE_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data...CARPORT_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data...STOP_ORDER_ID');
        $I->dontSeeResponseCodeIs(404);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
