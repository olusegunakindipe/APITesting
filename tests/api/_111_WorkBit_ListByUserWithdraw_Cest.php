<?php 

class _111_WorkBit_ListByUserWithdraw_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function ListByUserWithdraw(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check the data response in this api');
        $page = 1;
        $size = 20;
        $urlParams = [
            $page,
            $size
        ];
        $api = "/WorkBit/ListByUserWithdraw/";
        $fullPath = $api . join("/", $urlParams);
       
        $I->haveHttpHeader('accept', 'application/json');
        $I->haveHttpHeader('Content-Type', 'application/json');
         $data = $I->sendGET($fullPath);
        $data = $I->grabDataFromResponseByJsonPath('debug');
        $I->DisplayResponse($data); //This is response Time
        $I->seeResponseContainsJson(array('time' => $data[0]['time']));
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].USED_MONEY');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].WITHDRAW_NO');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].UPDATE_TIME');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].WITHDRAW_FEE');
        $I->seeResponseJsonMatchesJsonPath('$.data.pageInfo.total');
        $I->seeResponseIsJson();
        $I->dontSeeResponseContainsJson(['code' => 401]);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
    }
}
