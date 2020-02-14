<?php 

class _90_WorkBitListByRemit_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function WorkBitListRemit(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the some data are present in the API');
        $data = $I->sendGET('/WorkBit/ListByRemitHistory/1/20');
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->CheckWorkBitList($data); 
        $I->seeResponseIsJson(); 
        $I->seeResponseCodeIs(200); 
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
