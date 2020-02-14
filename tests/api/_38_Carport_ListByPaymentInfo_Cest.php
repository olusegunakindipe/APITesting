<?php 

class _38_Carport_ListByPaymentInfo_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }
    public function ListPaymentInfo(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Get the response Time of ToolMenuApi');
        $data= $I->sendGET('Carport/ListByPaymentInfo/2019-02-07/2020-02-07/1/20');
        $I->wantTo('check Info about the response and peak Time');
        $I->DisplayResponse($data);
        $I->dontSeeResponseContainsJson(['total' => 0]);
        $I->wantTo('check the number of contents and total page');
        $I->CheckContent($data);
        $I->seeResponseIsJson();
        $I->dontSeeResponseCodeIs(401);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
