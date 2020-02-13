<?php 

class _10_Province_ListAll_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function ProvinceList(ApiTester $I) 
    {
        $I->AdminLogin();
        $I->wantTo('Get to the data in the List');
        $I->haveHttpHeader('accept', 'application/json');
        $I->haveHttpHeader('Content-Type','application/json');
        $data = $I->sendGET('Province/ListAll');
        $I->seeResponseContainsJson([
            'data' => [
                'DISTRICT_CODE' => '110000',
                'DISTRICT_NAME' => '北京市',
                'PID' =>'0',  
            ]
        ]);
        $I->DisplayResponse($data);
        // $data = $I->grabDataFromResponseByJsonPath('debug');
        $I->grabResponse();
        $I->CheckResponseTimeEquals($data);
        // $I->CheckId();
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
    }
}
