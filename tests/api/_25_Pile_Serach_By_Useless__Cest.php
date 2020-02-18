<?php 

class _25_Pile_Serach_By_Useless__Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function PileSearchByUseless(ApiTester $I) 
    {
        $I->AdminLogin();
        $I->wantTo('Check for data correctness');
        $page = 1;
        $size = 20;
        $urlParams = [
            $page,
            $size
        ];
        $api = "/Pile/SearchByUseless/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->DisplayResponse($data);
        $datas = $I->grabDataFromResponseByJsonPath('data');
        echo "Total number:";
        print_r($datas[0]['pageInfo']['total']);
        $I->seeResponseJsonMatchesJsonPath('$.data.data.[0].CHARGING_PILE_SN');
        $I->seeResponseJsonMatchesJsonPath('$.data.data.[0].CHARGING_PILE_NAME');
        $I->seeResponseJsonMatchesJsonPath('$.debug.time');
        $I->seeResponseIsJson();
        $I->dontSeeResponseCodeIs(401);
        $I->seeResponseCodeIs(200);  
    }

}
