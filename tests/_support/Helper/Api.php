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

    public function CheckResponseTimeEquals($data)
    {
        $datas = $this->Res($data); 
        $this->assertLessOrEquals('1.09', $datas['debug']['time'], "Response Time");
    }

    public function CheckId($data)
    {
        $datas = $this->Res($data); 
        $this->assertEquals('350000', $datas['data'][0]['id'], "Check if the ID is Matches");
    }

    public function CheckVariousData($data)
    {
        $datas = $this->Res($data); 
        $this->assertEquals('50637.73', $datas['data']['log'][0]['total_hour'], "Check if Total Hour Matches");
        $this->assertNotEmpty($datas['data']['log'][0]['profit'], "Check if Total Hour Matches");
        $this->assertLessThanOrEqual('0.6', $datas['data']['log'][0]['cost_price'], "Check if Cost Price is Less than or Equal to");
       
    }
  
    public function CheckNumber($data)
    {
        $datas = $this->Res($data); 
        $this->assertEquals('2020-01-14 12:43:00', $datas['data']['data'][0]['CREATE_TIME'], "Check if create_time Matches");
        
        $this->assertLessThanOrEqual('1', $datas['data']['data'][0]['num'], "Check if num field is Less than or Equal to");
    }

    public function CheckDataIsEmpty($data)
    {
        $datas = $this->Res($data); 
        $this->assertIsEmpty($datas['data']['data'], "Check if data is empty");
    }

    public function CheckDetail($data)
    {
        $datas = $this->Res($data); 
        $this->assertGreaterThanOrEqual('516957.9232', $datas['data']['income'], "Check the Total Income");
        $this->assertGreaterThanOrEqual('38163', $datas['data']['arpuUser'], "Check the total Arpu User");
        $this->assertIsEmpty($datas['data']['totalUser'], "Check if totalUser is empty");
    }

    public function CheckPresence($data)
    {
        $datas = $this->Res($data); 
        $this->assertEquals('锦绣花园四期', $datas['data']['data'][0]['CELL_NAME'], "Check if Cell name is present");
        $this->assertEquals('CO201906031902596c41def21fb4237a', $datas['data']['data'][0]['CHARGE_ORDER_ID'], "Check if CHARGE_ORDER_ID is present");
        $this->assertEquals('15060121896', $datas['data']['data'][1]['MOBILE_PHONE'], "Check if MOBILE is correct");
    }

   public function CheckDataIsCorrect($data)
   {
        $datas = $this->Res($data); 
        $this->assertEquals('426031', $datas['data']['chargeOrder'], "Check if ChargeOrder is equals");
        $this->assertNotEmpty($datas['data']['log'][0]['statistics_date'], "Check if the statistics date is not empty");
        $this->assertIsEmpty($datas['data']['log'][0]['orderNum'], "Check if the order number is empty");
   }

   public function CheckRefundNos($data)
   {
        $datas = $this->Res($data); 
        $this->assertEquals('RF20200111210125350', $datas['data']['data'][0]['REFUND_ORDER_NO'], "Check if RefundOrder is equals");
        $this->assertLessThan('4', $datas['data']['data'][0]['PAY_WAY'], "Check if Payway is less than 4");
   
   }

   public function CheckDataPageNumbers($data)
   {
        $datas = $this->Res($data); 
        $this->assertEquals('217', $datas['data']['data'][0]['ID'], "Check if ID is equals");
        $this->assertEquals('1887', $datas['data']['pageInfo']['total'], "Check if TotalPage is equal");
        $this->assertGreaterThanOrEqual('20', $datas['data']['pageInfo']['size'], "Check if Pagesize is 20");
   }
   
   public function CheckForElectricityNo($data)
   {
        $datas = $this->Res($data); 
        $this->assertEquals('454544545445454', $datas['data'][0]['ELECTRICITY_METER_SN'], "Check if NUMBER is equals");
   } 

   public function CheckCarportListData($data)
   {
        $datas = $this->Res($data); 
        $this->assertEquals('100000228122', $datas['data']['data'][0]['model_no'], "Check if model_no is equals");
        $this->assertEquals('admindev', $datas['data']['data'][0]['CREATE_USER_ACCOUNT'], "Check if CREATE_USER_ACCOUNT is equals");
        $this->assertNotNull($datas['data']['data'][0]['USER_ID'], "USER_IDe should not be null");
    }

   public function AlertTime($data)
   {
        $datas = $this->Res($data); 
        $this->assertEquals('2019-10-17 17:23:11', $datas['data']['data'][0]['ALERT_TIME'], "Check if NUMBER is equals");
        $this->assertEquals('海岸城易安物联总部充电站', $datas['data']['data'][0]['SITE_NAME'], "Check if NUZA is equals");
   }

   public function CheckIncome($data)
   {
        $datas = $this->Res($data); 
        $this->assertGreaterThanOrEqual('38639.7620', $datas['data']['income'], "Check if Income is greater or equals");
   }

   public function CheckValueIsOk($data)
   {
        $datas = $this->Res($data); 
        $this->assertEquals('410305000420190509135908', $datas['data'][0]['CARPORT_ID'], "Check if Income is greater or equals");
        $this->assertNotNull($datas['data'][0]['CARPORT_NAME'], "Carport Name should not be null");
   }
   
   public function CheckUserAndCharge($data)
   {
        $datas = $this->Res($data); 
        $this->assertEquals('100000056848', $datas['data']['data'][0]['USER_ID'], "Check if USER_ID is correct");
        $this->assertEquals('CO201906031902548519f0d912f497c9', $datas['data']['data'][0]['CHARGE_ORDER_ID'], "Check if CHARGE ORDER is correct");
   }

   public function CheckContent($data)
   {
        $datas = $this->Res($data); 
        $this->assertEquals('333', $datas['data']['pageInfo']['total'], "Check if total or equals");
        $this->assertEquals('17', $datas['data']['pageInfo']['pageTotal'], "Check if PageTotal is equals");
        $this->assertEquals('20', $datas['data']['pageInfo']['size'], "Check if size equals");
   }

   public function CheckUserData($data)
   {
        $datas = $this->Res($data); 
        $this->assertEquals('100000227661', $datas['data']['USER_ID'], "Check if user data is correct");
        $this->assertEquals('1', $datas['data']['USER_TYPE'], "Check if USER_TYPE is equals");
   }

   public function CheckCarportChargeHistory($data)
   {
        $datas = $this->Res($data); 
        $this->assertEquals(0, $datas['data']['data'][0]['AVG_ELECTRICITY'], "Check if AVG_ELECTRICITY is correct");
        $this->assertEquals('CO20200116100713imLPsQ2AEgpfK   ', $datas['data']['data'][0]['CHARGE_ORDER_ID'], "Check if CHARGE_ORDER_ID is correct");
        $this->assertEquals('易安充测试车棚_邓', $datas['data']['data'][0]['CARPORT_NAME'], "Check if CARPORT_NAME is correct");
        $this->assertNotEmpty($datas['data']['data'][0]['CHARGING_PILE_SN'], "Check the CHARGING_PILE_SN is not empty ");
   
    }
    
    public function CheckData($data)
    {
        $datas = $this->Res($data); print_r($datas);
        $this->assertEquals('333', $datas['data']['stopOrder'], "Check if stopOrder is correct");
        $this->assertEquals('31313', $datas['data']['chargeOrder'], "Check if chargeOrder is equals");
        $this->assertEquals('42', $datas['data']['packageOrder'], "Check if packageOrder equals");
        $this->assertEquals('31688', $datas['data']['totalOrder'], "Check if totalOrder equals");
    }

    public function CheckAccount($data)
    {
        $datas = $this->Res($data); print_r($datas);
        $this->assertEquals('admindev', $datas['data']['data'][0]['OPERATION_ACCOUNT'], "Check if operation account is correct");
        $this->assertEquals('1', $datas['data']['data'][0]['STATE'], "Check if STATE is correct");
    }

    public function CheckForValue($data)
    {
        $datas = $this->Res($data); 
        $this->assertEquals('城东名园', $datas['data']['data'][0]['CELL_NAME'], "Check if cell name corresponds");
        $this->assertEquals('2020-01-11 23:12:12.700', $datas['data']['data'][0]['LAST_UPDATE'], "Check if last update corresponds");
        $this->assertEquals('开发测试', $datas['data']['data'][2]['ELECTRICITY_METER_MODEL'], "Check if this electricity name corresponds");
    }

    public function GetDataCheck($data)
    {
        $datas = $this->Res($data); print_r($datas);
        $this->assertNotEmpty($datas['data']['data'][0]['CELL_ID'], "Check the CELL_ID is not empty ");
        $this->assertEquals('2020-01-13 14:21:09.813', $datas['data']['data'][0]['CREATE_TIME'], "Check if create time corresponds");
        $this->assertEquals('摩尔城', $datas['data']['data'][0]['CELL_NAME'], "Check if CELL_NAME corresponds");
        $this->assertNotNull($datas['data']['data'][1]['SITE_NUM'], "SITE_NUM should not be null");    
    }

    public function CheckAllDeviceData($data)
    {
        $datas = $this->Res($data);
         $this->assertNotEmpty($datas['data']['data'][0]['CELL_ID'], "Check the CELL_ID is not empty ");
        $this->assertEquals('思思小区', $datas['data']['data'][0]['CELL_NAME'], "Check if CELL_NAME corresponds");
        $this->assertIsEmpty($datas['data']['data'][0]['ORDER_NUM'], "Check if order_numarray is empty");
    }

    public function CheckCarportDeviceData($data)
    {
        $datas = $this->Res($data); 
        $this->assertNotEmpty($datas['data']['data'][0]['ENTRANCE_GUARD_NAME'], "Check the GUARD_NAME is not empty ");
        $this->assertEquals('0511', $datas['data']['data'][0]['DEVICE_SN'], "Check if create time corresponds");
        $this->assertEquals('城东名园小区智能车棚', $datas['data']['data'][0]['CARPORT_NAME'], "Check if CELL_NAME corresponds");
        $this->assertNotNull($datas['data']['data'][1]['DIRECT'], "SITE_NUM should not be null");    
    }

    public function CheckUsereBalanceData($data)
    {
        $datas = $this->Res($data); print_r($datas);
        $this->assertEquals('100000207574', $datas['data']['data'][0]['USER_ID'], "Check if USER_ID corresponds");
        $this->assertEquals('YACSZ2020020723401537832819', $datas['data']['data'][0]['RECHARGE_ORDER_ID'], "Check if RECHARGE_ORDER_ID corresponds");
        $this->assertNotNull($datas['data']['data'][1]['PAY_PRICE'], "PAY_PRICE should not be null");    
    }


    public function checkCarportList($data)
    {
        $datas = $this->Res($data); print_r($datas);
        $this->assertEquals('2019-12-27 15:58:23.287', $datas['data']['data'][0]['ALERT_TIME'], "Check if alert time corresponds");
        $this->assertIsEmpty($datas['data']['data'][0]['ALERT_STATE'], "Check if ALERT STATE is empty");
        $this->assertEquals('花都盛景小区电动车充电站', $datas['data']['data'][0]['SITE_NAME'], "Check if SITE_NAME corresponds");
        $this->assertEquals('1401090003', $datas['data']['data'][0]['CELL_ID'], "Check if SITE_NAME corresponds");
    }

    public function checkPropertyData($data)
    {
        $datas = $this->Res($data);
        $this->assertEquals('110101199003072631', $datas['data']['data'][1]['PROPERTY_ID'], "Check if PROPERTY_ID corresponds");
        $this->assertIsEmpty($datas['data']['data'][1]['IS_DX'], "Check if IS_DXis empty");
        $this->assertEquals('测试', $datas['data']['data'][1]['PROPERTY_CONTACT_PERSON'], "Check if PROPERTY_ID corresponds");
        $this->assertEquals('2020-01-09 21:08:05', $datas['data']['data'][1]['CREATE_TIME'], "Check if CREATE_TIME corresponds");
        $this->assertIsEmpty($datas['data']['data'][1]['IS_YS'], "Check if IS_YS is empty");
    }

    public function checkFlatComplexList($data)
    {
        $datas = $this->Res($data);
        $this->assertEquals('5002340002', $datas['data']['data'][0]['CELL_ID'], "Check if CELL_ID corresponds");
        $this->assertEquals('玫瑰园', $datas['data']['data'][0]['CELL_NAME'], "Check if CELL NAME corresponds");
        $this->assertIsEmpty($datas['data']['data'][0]['AREA'], "Check if AREA empty");
        $this->assertEquals('500234', $datas['data']['data'][0]['CELL_DISTRICT_CODE'], "Check if CELL_DISTRICT_CODE corresponds");
    }

    public function checkForData($data)
    {
        $datas = $this->Res($data); 
        $this->assertEquals('2020-02-05', $datas['data']['log'][1]['statistics_date'], "Check if second statistics_date corresponds");
        $this->assertIsEmpty($datas['data']['log'][1]['rechargeOrderNum'], "Check if rechargeOrderNum is empty");
        $this->assertIsEmpty($datas['data']['log'][1]['userNum'], "Check if userNum is empty");
    }

    public function CarportGetData($data)
    {
        $datas = $this->Res($data); print_r($datas);
        $this->assertEquals( 72, $datas['data']['ID'], "Check if ID corresponds");
        $this->assertNotNull($datas['data']['CARPORT_ID'], "CARPORT_ID must not be null");
        $this->assertEquals('龙湖世纪峰景（CP)小区智能车棚', $datas['data']['CARPORT_NAME'], "Check if CARPORT_NAME corresponds");
    }

    public function checkTestData($data)
    {
        $datas = $this->Res($data);
        $this->assertEquals('4503050014', $datas['data']['data'][0]['CELL_ID'], "Check if CELL_ID corresponds");
        $this->assertEquals('450305001420200113043128', $datas['data']['data'][0]['CARPORT_ID'], "Check if CARPORT_ID corresponds");
        $this->assertEquals('摩尔城', $datas['data']['data'][0]['CELL_NAME'], "Check if CELL_NAME corresponds");
        $this->assertIsEmpty($datas['data']['data'][0]['LOCATION'], "Check if Location is empty");
        $this->assertIsEmpty($datas['data']['data'][0]['MOBILE'], "Check if Mobile is empty");
    }

    public function TestBillingData($data)
    {
        $datas = $this->Res($data);
        $this->assertNotEmpty($datas['data']['data'][0]['STRATEGY_RATE_ID'], "Check the STRATEGY_RATE_ID is not empty ");
        $this->assertEquals('七星苑小区', $datas['data']['data'][0]['CELL_NAME'], "Check if CELL_NAME corresponds");
        $this->assertEquals('默认分段费率', $datas['data']['data'][0]['RATE_NAME'], "Check if RATE_NAME corresponds");
        $this->assertEquals('4503050011', $datas['data']['data'][0]['CELL_ID'], "Check if CELL_ID corresponds");
    }

    public function TestPackageData($data)
    {
        $datas = $this->Res($data);
        $this->assertNotEmpty($datas['data']['data'][0]['PACKAGE_ID'], "Check the PACKAGE_ID is not empty ");
        $this->assertEquals('摩尔城充电站', $datas['data']['data'][0]['SITE_NAME'], "Check if SITE_NAME corresponds");
        $this->assertEquals('普通', $datas['data']['data'][0]['PACKAGE_TYPE_STR'], "Check if PACKAGE_TYPE_STR corresponds");
        $this->assertEquals('2.00', $datas['data']['data'][0]['PAY_MONEY'], "Check if PAY_MONEY corresponds");
        $this->assertNotEmpty($datas['data']['data'][0]['CREATE_TIME'], "Check the CREATE_TIME is not empty ");
        $this->assertEquals('100小时', $datas['data']['data'][0]['CUSTOM_NAME'], "Check if CUSTOM_NAME corresponds");
    }
    
    public function TestPackageSystemStop($data)
    {
        $datas = $this->Res($data);
        $this->assertNotEmpty($datas['data']['data'][0]['PACKAGE_ID'], "Check the PACKAGE_ID is not empty ");
        $this->assertEquals('7个月', $datas['data']['data'][0]['PACKAGE_NAME'], "Check if PACKAGE_NAME corresponds");
        $this->assertEquals('4503050013', $datas['data']['data'][0]['CELL_ID'], "Check if CELL_ID corresponds");
        $this->assertEquals(1, $datas['data']['data'][0]['BILLING_TYPE'], "Check if BILLING_TYPE corresponds");
        $this->assertNotEmpty($datas['data']['data'][0]['CHARGE_DURATION'], "Check the CREATE_TIME is not empty ");
        $this->assertEquals('300', $datas['data']['data'][0]['VALID_COUNT'], "Check if VALID_COUNT corresponds");
        $this->assertEquals('30.0000', $datas['data']['data'][0]['PAY_MONEY'], "Check if PAY_MONEY corresponds");
        $this->assertEquals('4503050013300060', $datas['data']['data'][0]['SYS_DURATION_ID'], "Check if SYS_DURATION_ID corresponds");
        $this->assertIsEmpty($datas['data']['data'][0]['CHARGE_DESCRIPTION'], "Check if CHARGE_DESCRIPTION is empty");
    }

    public function TestAccountList($data)
    {
        $datas = $this->Res($data);
        $this->assertNotEmpty($datas['data']['data'][0]['ACCOUNT_ID'], "Check the ACCOUNT_ID is not empty ");
        $this->assertEquals('晋都代理商', $datas['data']['data'][0]['NAME'], "Check if NAME corresponds");
        $this->assertEquals('agent_jin', $datas['data']['data'][0]['ACCOUNT'], "Check if ACCOUNT corresponds");
        $this->assertEquals(2, $datas['data']['data'][0]['ACCOUNT_TYPE'], "Check if ACCOUNT_TYPE corresponds");
        $this->assertIsEmpty($datas['data']['data'][0]['BANK_NAME'], "Check if BANK_NAME is empty");
    }

    public function GetBillingDataRate($data)
    {
        $datas = $this->Res($data); print_r($datas);
        $this->assertEquals('1682', $datas['data']['rate'][0]['ID'], "Check if ID corresponds");
        $this->assertEquals('3505050019', $datas['data']['rate'][0]['CELL_ID'], "Check if CELL_ID corresponds");
        $this->assertEquals('若爱服饰（YYXS)充电站', $datas['data']['rate'][0]['SITE_NAME'], "Check if SITE_ID corresponds");
    }

    public function CheckWorkBitList($data)
    {
        $datas = $this->Res($data);
        $this->assertEquals('RN165602160370811904', $datas['data']['data'][0]['REMIT_NO'], "Check if REMIT_NO corresponds");
        $this->assertEquals('张宁', $datas['data']['data'][0]['NAME'], "Check if NAME corresponds");
        $this->assertEquals('NB4DfRN165602160370811904', $datas['data']['data'][0]['OUT_PAY_NO'], "Check if OUT_PAY_NO corresponds");
        $this->assertNotEmpty($datas['data']['data'][0]['BALANCE'], "Check if BALANCE is empty");
    }

    public function checkUserManagerData($data)
    {
        $datas = $this->Res($data);
        $this->assertEquals('100000228120', $datas['data']['data'][0]['USER_ID'], "Check if USER_ID corresponds");
        $this->assertIsEmpty($datas['data']['data'][0]['TOTAL_NUM'], "Check if TOTAL_NUM is empty");
        $this->assertIsEmpty($datas['data']['data'][0]['PACKAGE_NUM'], "Check if PACKAGE_NUM is empty");
        $this->assertEquals('13662639331', $datas['data']['data'][0]['MOBILE_PHONE'], "Check if MOBILE_PHONE corresponds");

    }
    
    public function TestForUserFeedbackData($data)
    {
        $datas = $this->Res($data); print_r($datas);
        $this->assertNotEmpty($datas['data']['data'][0]['ID'], "Check the ID is not empty ");
        $this->assertEquals('云南省昆明市五华区', $datas['data']['data'][0]['AREA'], "Check if AREA corresponds");
        $this->assertEquals('保利大家14栋车棚（XS)', $datas['data']['data'][0]['CELL_NAME'], "Check if CELL_NAME corresponds");
        $this->assertEquals( 1, $datas['data']['data'][0]['QUESTTYPE'], "Check if QUESTTYPE corresponds");
        $this->assertEquals(' 无电话', $datas['data']['data'][0]['ANSWER'], "Check if ANSWER corresponds");
    }

    public function CheckUserDurationData($data){
        $datas = $this->Res($data); 
        $this->assertNotEmpty($datas['data']['data'][0]['PACKAGE_ORDER_ID'], "Check the PACKAGE_ORDER_ID is not empty ");
        $this->assertLessThanOrEqual(1, $datas['data']['data'][0]['PACKAGE_TYPE_INT'], "Check if PACKAGE_TYPE_INT corresponds");
        $this->assertEquals('100000211706', $datas['data']['data'][0]['USER_ID'], "Check if USER_ID corresponds");
    }
    
    public function CheckUserStopPackage($data)
    {
        $datas = $this->Res($data); 
        $this->assertEquals('100000049408', $datas['data']['data'][0]['USER_ID'], "Check if USER_ID corresponds");  
        $this->assertEquals('201910221409111047866820', $datas['data']['data'][0]['STOP_ORDER_ID'], "Check if STOP_ORDER_ID corresponds");
        $this->assertEquals('320116000220191008095400', $datas['data']['data'][0]['CARPORT_ID'], "Check if CARPORT_ID corresponds");
        $this->assertEquals('2019-10-22 14:09:11.427', $datas['data']['data'][0]['IN_TIME'], "Check if IN_TIME corresponds");
        $this->assertEquals('2019-10-22 16:13:40.310', $datas['data']['data'][0]['CREATE_TIME'], "Check if CREATE_TIME corresponds");
    }

    public function FlatComplexData($data)
    {
        $datas = $this->Res($data);
        $this->assertEquals('若爱服饰（YYXS)充电站', $datas['data'][0]['SITE_NAME'], "Check if SITE_NAME corresponds");  
        $this->assertNotEmpty($datas['data'][0]['CELL_ID'], "Check the CELL_ID is not empty ");
    }

    public function getOrderListData($data)
    {
        $datas = $this->Res($data); print_r($datas);
        $this->assertEquals('WR166318357380891648', $datas['data']['data'][0]['WITHDRAW_NO'], "Check if WITHDRAW_NO corresponds");  
        $this->assertNotEmpty($datas['data']['data'][0]['WITHDRAW_FEE'], "Check the WITHDRAW_FEE is not empty ");
    }

}
