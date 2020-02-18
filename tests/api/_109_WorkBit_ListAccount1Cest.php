<?php 

class _109_WorkBit_ListAccount1Cest
{
    public function _before(ApiTester $I)
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
        $fullpath = $api . join("/", $urlParams);
        $path = sprintf('?key=&type=%d',$type);
        $fullpath .= $path;
        $data = $I->sendGET($fullpath);
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].ACCOUNT_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].NAME');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].WITHDRAWALS');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].ACCOUNT_TYPE');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].BALANCE');
        // $I->TestAccountList($data);
        $I->dontSeeResponseContainsJson(['code' => 401]);
        $I->dontSeeResponseContainsJson(['data' => null]);
        $I->seeResponseIsJson(); 
        $I->seeResponseCodeIs(200); 
    }
}
