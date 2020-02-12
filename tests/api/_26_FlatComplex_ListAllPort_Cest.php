<?php 

class _26_FlatComplex_ListAllPort_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {

    }

    public function FlatComplexListAllPort(ApiTester $I){
        $I->AdminLogin();
        $I->wantTo('Check if the data is correct');
        $data = $I->sendGET('FlatComplex/ListByAllPort/1/20');
        // $I->CheckPresence();
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);

         $I->wantTo('check if the data are of specfic value');
         $I->seeResponseContainsJson([ 
         'CELL_ID' => '5001180003',
         'CELL_NAME' => '思思小区',
         'ID' => '890165',
         'TOTAL_MINUTE' => 0
    ]);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200); 
    }
}
