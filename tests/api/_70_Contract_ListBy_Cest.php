<?php 

class _70_Contract_ListBy_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function ContractList(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('check possible data in the API record corresponding');
        $page = 1;
        $size = 20;
        $urlParams = [
            $page,
            $size
        ];
        $api = "/Contract/ListBy/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->DisplayResponse($data);
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].id');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].CONTRACT_CODE');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].AGENT_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].AGENT_NAME');
        $I->dontSeeResponseCodeIs(401);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
    }
}
