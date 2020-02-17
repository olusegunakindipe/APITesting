<?php 

class _89_WorkBit_ListAcoount_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function WorkBitListAccount(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the some data are present in the API');
        $page = 1;
        $size = 20;
        $id =2;
        $fullpath = "";
        $urlParams = [
            $page,
            $size
        ];
        $api = "/WorkBit/ListByAccount/";
        $path = $api . join("/", $urlParams);
        $fullpath = sprintf('key=&type=%d',$id);
        $fullpath .= $path;
        $data = $I->sendGET($fullpath);
        $data = $I->sendGET('/WorkBit/ListByAccount/1/20');
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].ACCOUNT_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].NAME');
        // $I->TestAccountList($data);
        $I->dontSeeResponseContainsJson(['data' => 'invalid page']);
        $I->dontSeeResponseContainsJson(['data' => 'invalid size']);
        $I->dontSeeResponseCodeIs(401); 
        $I->seeResponseIsJson(); 
        $I->seeResponseCodeIs(200); 
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
