<?php 

class _61_Carport_Info_Cest
{
    public function _before(ApiTester $I)
    {
    }

    public function CarPortInfo(ApiTester $I)
    {
        $I->AdminLogin();
        $I->wantTo('check possible data in the API record corresponding');
        $data=$I->sendGET('/Carport/Info');
        $I->DisplayResponse($data);
        $I->wantTo('Check if Datatype is correct');
        $I->seeResponseMatchesJsonType([ 'data'=>[
            'type' => 'string',
            'num_flat_complex' => 'string',
            'num_agent' => 'string',
            'num_pile' => 'string',
            'num_warns' => 'string',
            'num_online' => 'string',
            'num_defect'=> 'string|null'
            ]
        ]);
        $I->dontSeeResponseCodeIs(401);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
    }
}
