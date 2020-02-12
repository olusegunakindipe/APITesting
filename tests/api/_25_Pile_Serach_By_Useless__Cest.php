<?php 

class _25_Pile_Serach_By_Useless__Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function PileSearchByUseless(ApiTester $I) {
        $I->AdminLogin();
        $I->wantTo('Check for data correctness');
    
        $data = $I->sendGET('Pile/SearchByUseless/1/20');
//  $I->CheckRefundNos();
        $I->DisplayResponse($data);
         $datas = $I->grabDataFromResponseByJsonPath('data');
         echo "Total number:" ;
         print_r($datas[0]['pageInfo']['total']);
         $I->seeResponseIsJson();
         $I->CheckResponseTimeEquals($data);
       
        $I->seeResponseCodeIs(200);
        
    }

}
