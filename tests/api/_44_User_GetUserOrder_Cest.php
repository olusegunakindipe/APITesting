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
        $data=$I->sendGET('/User/GetUserOrder/100000227661/1/20');
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->wantTo('check if the data is empty');
        $I->seeResponseContainsJson(['total' => 0, 'pageTotal'=>0, 'size'=>20]);
        $I->wantTo('Get response is empty');
        $I->CheckForEmptiness($data);
        $I->dontSeeResponseCodeIs(401);
        $I->seeResponseContainsJson([ 'data'=>[
            'time' => 'float',
            'query' => 'integer',
            'cache' => 'integer|null',
            ]
        ]);
        $I->SeeResponseContainsJson(['data' => []]);
        $I->SeeResponseContainsJson(['cache' => 0]);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}

