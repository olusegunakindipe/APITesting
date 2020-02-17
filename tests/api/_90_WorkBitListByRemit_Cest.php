<?php 

class _90_WorkBitListByRemit_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function WorkBitListRemit(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the some data are present in the API');
        $page = 1;
        $size = 20;
        $st= 0;
        $st1 = 1;
        $fullpath= "";
        $urlParams = [
            $page,
            $size
        ];
        $api = "/WorkBit/ListByRemitHistory/";
        $fullpath = $api . join("/", $urlParams);
        $path = sprintf('?state=%d,%d',$st,$st1);
        $fullpath .=$path;
        $data = $I->sendGET($fullpath);
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        // $I->CheckWorkBitList($data); 
        $I->dontSeeResponseContainsJson(['code' => 401]);
        $I->seeResponseIsJson(); 
        $I->seeResponseCodeIs(200); 
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
