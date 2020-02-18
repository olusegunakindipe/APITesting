<?php 

class _87_WorkBit_ListSell_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function WorkBitListSell(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the some data are present in the API');
        $page = 1;
        $size = 20;
        $urlParams = [
            $page,
            $size
        ];
        $api = "/WorkBit/ListByBisSell/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].ID');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].NAME');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].BI_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data.data[0].SELL_NO');
        $I->dontSeeResponseCodeIs(401); 
        $I->seeResponseIsJson(); 
        $I->seeResponseCodeIs(200); 
    }
}
