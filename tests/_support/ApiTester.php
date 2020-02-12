<?php


/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method void pause()
 *
 * @SuppressWarnings(PHPMD)
*/
class ApiTester extends \Codeception\Actor
{
    use _generated\ApiTesterActions;

   /**
    * Define custom actions here
    */
    public function Login($account, $password) {
        $I = $this;
        $I->wantTo('Login with Authorization');
        $I->haveHttpHeader('accept', 'application/json');
        $I->haveHttpHeader('Content-Type','application/json');
        $I->sendPOST('Auth/Login',
        ['account' => $account,
        'password'=> $password
        ]);
         $I->seeResponseIsJson();
        $token = $I->grabDataFromResponseByJsonPath('data.token');
        // print_r($token);
        $I->haveHttpHeader('token_key', $token[0]);
        $I->seeResponseIsJson(); 
        $I->seeResponseCodeIs(200); 
    }

    public function AdminLogin(){
        $I = $this;
        $I->Login('admindev','123456');
        $I->seeResponseIsJson(); 
    }

    public function DisplayResponse($data){
        $I = $this;
        $I->wantTo('Check response Time for this Api');
        $data = $I->grabDataFromResponseByJsonPath('debug');
        echo "Response Time is:";
        print_r($data[0]['time']);  
    }
}
