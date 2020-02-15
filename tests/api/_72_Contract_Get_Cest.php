<?php 

class _72_Contract_Get_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function PropertyListBy(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the some data are present in the API');
        $id = 944;
        $urlParams = [
            $id,
        ];
        $api = "/Contract/Get/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->dontSeeResponseCodeIs(401);
        $I->wantTo('checking for data in the API');
        $I->seeResponseMatchesJsonType([ 'data' => [
            'id' => 'string', 
            'AGENT_ID'=> 'string', 
            'PROPERTY_ID' => 'string',
            'EMPLOYEE_ID' => 'string',
            "REMARKS" => 'string|null',
            'CONTRACT_NUM' => 'string']
        ]);
        $I->seeResponseIsJson(); 
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
