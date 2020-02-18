<?php 

class _103_PrivilegeListByRole_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
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
        $I->dontSeeResponseCodeIs(401);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
    }
}
