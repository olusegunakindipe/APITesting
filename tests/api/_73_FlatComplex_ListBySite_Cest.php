<?php 

class _73_FlatComplex_ListBySite_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function FlatComplexListBySite(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Check if the some data are present in the API');
        $data = $I->sendGET('/FlatComplex/ListBySite/1/20');
        $I->wantTo('Get response Time for this Api');
        $I->DisplayResponse($data);
        $I->wantTo('check if the data is not empty');
        $I->seeResponseContainsJson(['total' => 731, 'pageTotal'=>37, 'size'=>20]);
        $I->seeResponseContainsJson([
            'SITE_NAME'=> '东景苑小区电动车充电站',
            'CELL_NAME'=>'东景苑',
            'AREA' => '山西省太原市万柏林区',
            'CELL_DISTRICT_CODE' => '140109',
            'LOCATION' => '东景苑测试',
            'CELL_TYPE' => 1
        ]);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200); 
    }
}
