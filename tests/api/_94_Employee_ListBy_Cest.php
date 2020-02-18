<?php 

class _94_Employee_ListBy_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function EmployeeListBy(ApiTester $I) 
    {
        $I->AdminLogin();
        $I->wantTo('Check for data correctness');
        $page = 1;
        $size = 20;
        $urlParams = [
            $page,
            $size
        ];
        $api = "/Employee/ListBy/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->DisplayResponse($data);
        $I->seeResponseIsJson();
        // $I->CheckResponseTimeEquals($data);
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->seeResponseJsonMatchesJsonPath('$.data.data.[0].EMPLOYEE_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data.data.[0].EMPLOYEE_NAME');
        $I->seeResponseJsonMatchesJsonPath('$.data.data.[0].EMPLOYEE_TYPE');
        $I->seeResponseJsonMatchesJsonPath('$.data.data.[0].EMPLOYEE_STATE');
        $I->dontSeeResponseCodeIs(404);
        $I->seeResponseCodeIs(200);
    }
}
