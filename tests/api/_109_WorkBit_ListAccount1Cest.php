<?php 

class _109_WorkBit_ListAccount1Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function WorkBitListAccount1(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the some data are present in the API');
        $page = 1;
        $size = 20;
        $type =1;
        $fullpath = "";
        $urlParams = [
            $page,
            $size
        ];
        $api = "/WorkBit/ListByAccount/";
        $path = $api . join("/", $urlParams);
        $fullpath = sprintf('key=&type=%d',$type);
        $fullpath .= $path;
        $data = $I->sendGET($fullpath);
        $data = $I->sendGET('/WorkBit/ListByAccount/1/20');
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].ACCOUNT_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].NAME');
        // $I->TestAccountList($data);
        $I->dontSeeResponseContainsJson(['code' => 401]);
        $I->dontSeeResponseContainsJson(['data' => null]);
        $I->seeResponseIsJson(); 
        $I->seeResponseCodeIs(200); 
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
