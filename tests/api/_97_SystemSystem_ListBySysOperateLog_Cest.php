<?php 

class _97_SystemSystem_ListBySysOperateLog_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function SystemListBySysOperateLog(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Get the Matching fields in the List');
        $startDate = "2020-01-11";
        $endDate = "2020-02-11";
        $page = 1;
        $size = 20;
        $urlParams = [
            $startDate,
            $endDate,
            $page,
            $size
        ];
        $api = "/System/ListBySysOperateLog/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->haveHttpHeader('accept', 'application/json');
        $I->seeHttpHeader('Content-Type','application/json');
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].OPERATION_ACCOUNT');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].DIRECTORY_NAME');
        $I->dontSeeResponseContainsJson(['code' => 401]);
        $I->seeResponseCodeIs(200);
    }
}
