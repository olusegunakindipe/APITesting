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
function Res($data){
    $response = $this->getModule('REST')->response;
    $data = json_decode($response, true);
    return $data;
   }
    public function CheckResponseTimeEquals($data){
        $datas = $this->Res($data); 
        $this->assertLessOrEquals('1.09',$datas['debug']['time'], "Response Time");
    }
    public function CheckId($data){
        $datas = $this->Res($data); 
        $this->assertEquals('350000', $datas['data'][0]['id'], "Check if the ID is Matches");
    }

    public function CheckVariousData($data){
        $datas = $this->Res($data); 
        $this->assertEquals('50637.73', $datas['data']['log'][0]['total_hour'], "Check if Total Hour Matches");
        $this->assertNotEmpty($datas['data']['log'][0]['profit'], "Check if Total Hour Matches");
        $this->assertLessThanOrEqual('0.6', $datas['data']['log'][0]['cost_price'], "Check if Cost Price is Less than or Equal to");
       
    }
  
    public function CheckNumber($data){
        $datas = $this->Res($data); 
        $this->assertEquals('2020-01-14 12:43:00', $datas['data']['data'][0]['CREATE_TIME'], "Check if create_time Matches");
        
        $this->assertLessThanOrEqual('1', $datas['data']['data'][0]['num'], "Check if num field is Less than or Equal to");
       
    }

    public function CheckDataIsEmpty($data){
        $datas = $this->Res($data); 
        $this->assertIsEmpty($datas['data']['data'], "Check if data is empty");
    }

    public function CheckDetail($data){
        $datas = $this->Res($data); 
        $this->assertGreaterThanOrEqual('516957.9232', $datas['data']['income'], "Check the Total Income");
        $this->assertGreaterThanOrEqual('38163', $datas['data']['arpuUser'], "Check the total Arpu User");
        $this->assertIsEmpty($datas['data']['totalUser'], "Check if totalUser is empty");
    }

    public function CheckForEmptiness($data){
        $datas = $this->Res($data); 
        // print_r($datas);
        $this->assertNotEmpty( $datas['debug']['time'], "Check the resonse time is not empty ");
        $this->assertIsEmpty($datas['data']['data'], "Check if data array is empty");
    }

    public function CheckPresence($data){
        $datas = $this->Res($data); 
        $this->assertEquals('锦绣花园四期',$datas['data']['data'][0]['CELL_NAME'], "Check if Cell name is present");
        $this->assertEquals('CO201906031902596c41def21fb4237a', $datas['data']['data'][0]['CHARGE_ORDER_ID'], "Check if CHARGE_ORDER_ID is present");
        $this->assertEquals('15060121896', $datas['data']['data'][1]['MOBILE_PHONE'], "Check if MOBILE is correct");
    }

   public function CheckDataIsCorrect($data) {
    $datas = $this->Res($data); 
    $this->assertEquals('426031',$datas['data']['chargeOrder'], "Check if ChargeOrder is equals");
    $this->assertNotEmpty($datas['data']['log'][0]['statistics_date'], "Check if the statistics date is not empty");
    $this->assertIsEmpty($datas['data']['log'][0]['orderNum'], "Check if the order number is empty");
   }

   public function CheckRefundNos($data) {
    $datas = $this->Res($data); 
    $this->assertEquals('RF20200111210125350',$datas['data']['data'][0]['REFUND_ORDER_NO'], "Check if RefundOrder is equals");
    $this->assertLessThan('4',$datas['data']['data'][0]['PAY_WAY'], "Check if Payway is less than 4");
   
   }

   public function CheckDataPageNumbers($data) {
    $datas = $this->Res($data); 
    $this->assertEquals('217',$datas['data']['data'][0]['ID'], "Check if ID is equals");
    $this->assertEquals('1887',$datas['data']['pageInfo']['total'], "Check if TotalPage is equal");
    $this->assertGreaterThanOrEqual('20',$datas['data']['pageInfo']['size'], "Check if Pagesize is 20");
   }
   public function CheckForElectricityNo($data) {
    $datas = $this->Res($data); 
    $this->assertEquals('454544545445454',$datas['data'][0]['ELECTRICITY_METER_SN'], "Check if NUMBER is equals");
   
   } 
   public function AlertTime($data){
    $datas = $this->Res($data); 
    $this->assertEquals('2019-10-17 17:23:11',$datas['data']['data'][0]['ALERT_TIME'], "Check if NUMBER is equals");
    $this->assertEquals('海岸城易安物联总部充电站',$datas['data']['data'][0]['SITE_NAME'], "Check if NUZA is equals");

   }
   public function CheckIncome($data){
    $datas = $this->Res($data); 
    $this->assertGreaterThanOrEqual('38639.7620',$datas['data']['income'], "Check if Income is greater or equals");

   }

   public function CheckValueIsOk($data){
    $datas = $this->Res($data); 
    $this->assertEquals('410305000420190509135908',$datas['data'][0]['CARPORT_ID'], "Check if Income is greater or equals");
    $this->assertNotNull($datas['data'][0]['CARPORT_NAME'], "Carport Name should not be null");
   }

   
   public function CheckUserAndCharge($data){
        $datas = $this->Res($data); 
        $this->assertEquals('100000056848',$datas['data']['data'][0]['USER_ID'], "Check if USER_ID is correct");
        $this->assertEquals('CO201906031902548519f0d912f497c9',$datas['data']['data'][0]['CHARGE_ORDER_ID'], "Check if CHARGE ORDER is correct");
   }

   public function CheckContent($data) {
     $datas = $this->Res($data); 
  
     $this->assertEquals('333',$datas['data']['pageInfo']['total'], "Check if total or equals");
     $this->assertEquals('17',$datas['data']['pageInfo']['pageTotal'], "Check if PageTotal is equals");
     $this->assertEquals('20',$datas['data']['pageInfo']['size'], "Check if size equals");

   }

}
