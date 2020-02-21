<?php 

class _97_SystemSystem_ListBySysOperateLog_Cest
{
    public function _before(ApiTester $I)
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
        $I->seeHttpHeader('Content-Type', 'application/json');
        // $I->getOrder($data);
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].OPERATION_ACCOUNT');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].ADDRESS');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].IP');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].OPEATION_NAME');
        $I->seeResponseJsonMatchesJsonPath('$.data.pageInfo.total');
        $I->dontSeeResponseContainsJson(['code' => 401]);
        $I->seeResponseCodeIs(200);
    }
}
