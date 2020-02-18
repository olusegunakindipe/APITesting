<?php 

class _05_SearchES_Query_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function SearchES(ApiTester $I) 
    {
        $I->AdminLogin();
        $I->wantTo('Get the Search Query data');
        //$name= "%E4%B8%AD%E6%B0%B4";
        $name = "中水";
        $name = urlencode($name);
        $type = "flatComplex";
        $role = 'hq';
        $path = sprintf('/SearchES/Query?name=%s&type=%s&role=%s&role_id=%d', $name, $type, $role, null);
        $data = $I->sendGET($path);
        $I->DisplayResponse($data); //This is response Time
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZD']);
        $I->seeResponseJsonMatchesJsonPath('$.data[0].type');
        $I->seeResponseJsonMatchesJsonPath('$.data[0].name');
        $I->seeResponseJsonMatchesJsonPath('$.data[0].id');
        $I->DisplayResponse($data);
        $I->dontSeeResponseCodeIs(401);
        $I->dontSeeResponseContainsJson(['data' => null]);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
