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
        $data = $I->sendGET('Carport/UserManagerList/2019-02-07/2020-02-07/1/20');
        $I->DisplayResponse($data);
        $I->seeResponseContainsJson([
            'data' => [
                'USER_ID' => '100000227011',
                'CREATE_TIME' => '2020-02-07 23:49:18',
                
            ]
        ]);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200); 
    }
}
