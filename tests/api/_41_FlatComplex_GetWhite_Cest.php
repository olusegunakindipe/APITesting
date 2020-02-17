<?php 

class _41_FlatComplex_GetWhite_Cest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }

    public function FlatComplexGetWhite(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('check possible data in the API record corresponding');
        $id = '100000056848';
        $urlParams = [
            $id
        ];
        $api = "/FlatComplex/GetWhite/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->DisplayResponse($data);
        // $I->CheckDataFlatComplex($data);
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
    }
}
