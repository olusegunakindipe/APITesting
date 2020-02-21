<?php 

class _110_WorkBitListByRemit1_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function WorkBitListRemit(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the some data are present in the API');
        $page = 1;
        $size = 20;
        $st= 2;
        // $st1 = 3;
        // $st2 = 4;
        $fullpath= "";
        $urlParams = [
            $page,
            $size
        ];
        $api = "/WorkBit/ListByRemitHistory/";
        $fullpath = $api . join("/", $urlParams);
        $path = sprintf('?state=%d',$st);
        $fullpath .=$path;
        $data = $I->sendGET($fullpath);
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        // $I->CheckWorkBitList($data); 
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].MANAGEMENT_FEE');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].DEDUCTED_TERM');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].DEDUCTED_MONEY');
        $I->seeResponseJsonMatchesJsonPath('$.data.pageInfo.total');
        $I->dontSeeResponseContainsJson(['code' => 401]);
        $I->seeResponseIsJson(); 
        $I->seeResponseCodeIs(200); 
    }
}
