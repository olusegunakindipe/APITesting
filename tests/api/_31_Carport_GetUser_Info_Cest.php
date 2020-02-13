<?php 

class _31_Carport_GetUser_Info_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }
    public function CarPortUser(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('check possible data in the API record corresponding');
        $data=$I->sendGET('Carport/GetUserInfo/2019-02-07/2020-02-07');
        $I->DisplayResponse($data);
        $I->wantTo('Check if response Time and Peak Time are contained in this Api');
        $I->wantTo('Check for Data and also the page numbers');
        $I->CheckIncome($data);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
    }
}
