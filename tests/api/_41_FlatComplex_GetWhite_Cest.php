<?php 

class _41_FlatComplex_GetWhite_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function FlatComplexGetWhite(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('check possible data in the API record corresponding');
        $id = '100000228124';
        $urlParams = [
            $id
        ];
        $api = "/FlatComplex/GetWhite/";
        $path = $api . join("/", $urlParams);
        $data = $I->sendGET($path);
        $I->DisplayResponse($data);
        // $I->CheckDataFlatComplex($data);
        $I->dontSeeResponseContainsJson(['data' => 'UNAUTHORIZED']);
        $I->seeResponseJsonMatchesJsonPath('$.data...USER_ID');
        $I->seeResponseJsonMatchesJsonPath('$.data...START_EFFECTIVE_TIME');
        $I->seeResponseJsonMatchesJsonPath('$.data...STATE');
        $I->dontSeeResponseContainsJson(['code' => 201]);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
    }
}
