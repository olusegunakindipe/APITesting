<?php
namespace Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class Api extends \Codeception\Module
{

//     public function Res($data){
//         $response = $this->getModule('REST')->response;
//        $data = json_decode($response, true);
            //return $data;

//    }
    public function Res($data)
    {
        $response = $this->getModule('REST')->response;
        $data = json_decode($response, true);
        return $data;
    }
}
