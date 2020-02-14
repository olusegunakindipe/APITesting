<?php 

class _08_User_UserManagerList_Cest
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
        $I->wantTo('Get the response Time of ToolMenuApi');
        $data = $I->sendGET('User/UserManagerList/2019-02-07/2020-02-07/1/20');
        $I->DisplayResponse($data); //This is response Time
        
        $I->checkUserManagerData($data);
        $I->seeResponseContainsJson(['total' => 185228, 'pageTotal' => 9262]);
        $I->dontSeeResponseCodeIs(401);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
    }
}
