<?php 

class _30_Alert_ListBy_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }
    public function AlertListBy(ApiTester $I) 
    {
        $I->AdminLogin();
        $I->wantTo('Get the response Time of ToolMenuApi');
        $data= $I->sendGET('Alert/ListBy/2019-02-07/2020-02-07/1/20');
        $I->wantTo('check Info about the response and peak Time');
        $I->DisplayResponse($data);
        $I->AlertTime($data);
        $I->dontSeeResponseContainsJson(['total' => 0]);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
