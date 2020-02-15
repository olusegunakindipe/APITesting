<?php 

class _38_Carport_ListByPaymentInfo_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }
    public function ListPaymentInfo(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('Get the correct data');
        $startDate = "2020-01-07";
        $endDate = "2020-02-07";
        $page = 1;
        $size = 20;
        $urlParams = [
            $startDate,
            $endDate,
            $page,
            $size
        ];
        $api = "/Carport/ListByPaymentInfo/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->wantTo('check Info about the response and peak Time');
        $I->DisplayResponse($data);
        $I->wantTo('check the number of contents and total page');
        $I->CheckContent($data);
        $I->seeResponseIsJson();
        $I->dontSeeResponseCodeIs(401);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); 
    }
}
