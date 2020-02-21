<?php 

class _103_PrivilegeListByRole_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function PrivilegeListByRole(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Get the data response');
        $page = 1;
        $limit = 20;
        $sort = 'name';
        $fullpath = '';
        $orderBy= 'true';
        $urlParams = [
            $page,
            $limit,
        ];
        $api = "/Privilege/ListByRole//";
        $fullpath = $api . join("/", $urlParams);
        $path = sprintf("?sort=%s&orderBy=%s", $sort,$orderBy);
        $fullpath .= $path;
        $data = $I->sendGET($fullpath);
        $I->DisplayResponse($data); //This is response Time
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->seeResponseJsonMatchesJsonPath('$.data...account');
        $I->seeResponseJsonMatchesJsonPath('$.data...status');
        $I->seeResponseJsonMatchesJsonPath('$.data...is_reset');
        $I->seeResponseJsonMatchesJsonPath('$.data.pageInfo.total');
        $I->dontSeeResponseCodeIs(401);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
    }
}
