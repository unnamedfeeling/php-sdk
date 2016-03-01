<?php namespace fetchr\php_sdk;

use \Httpful\Request;
/**
* 
*/
class Shiphappy
{
	private $_userName;
	private $_password;

	public function __construct($username, $password)
	{
		//return "Its working";
		$this->_userName = $username;
		$this->_password = $password;
	}

	public function getBulkStatus($order_ids)
	{
		$ordersStatus = array();

		$data   =   array(  'username' => $this->_userName,
			                'password' => $this->_password,
			                'method' => 'get_status_bulk',
			                'data' =>  $order_ids
			             );
  
        $data_string  	= json_encode($data);
        $url          	= 'http://menavip.com/api/get-status/';
        $jsonResponse 	= \Httpful\Request::post($url)
        				->sendsJson()
        				->body($data_string)
    					->sendIt();
    	
    	$arrayResponse 	= json_decode($jsonResponse->body, true);

    	foreach($arrayResponse['response'] as $ark => $arv) {
    		$ordersStatus[$arv['tracking_no']] = $arv['package_state']; 
    	}

    	return json_encode($ordersStatus);
	}

	public function getOrderStatus($order_id)
	{
		$orderStatus = array();

		$data   =   array(  'username' => $this->_userName,
			                'password' => $this->_password,
			                'method' => 'get_status',
			                'data' =>  $order_id
			             );
  
        $data_string  	= json_encode($data);
        $url          	= 'http://menavip.com/api/get-status/';
        $jsonResponse 	= \Httpful\Request::post($url)
        				->sendsJson()
        				->body($data_string)
    					->sendIt();

    	$arrayResponse 	= json_decode($jsonResponse->body, true);
    	foreach($arrayResponse['response'] as $ark => $arv) {
    		$orderStatus[$arv['tracking_no']] = $arv['package_state']; 
    	}
    	return json_encode($orderStatus);
	}

	public function createDeliveryOrder($data)
	{
		$dataString = 'args='.json_encode($data);
        $ch = curl_init();
        $url = 'http://menavip.com/client/api/';
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        // validate response
        $decoded_response   = json_decode($response, true);
        if(!is_array($decoded_response)){
            return $response;
        }

        $response = $decoded_response;
        return json_encode($response);
	}

	public function createFulfilmentOrder($data)
	{
		$ERPdata        = 'ERPdata='.json_encode($data);
        $merchant_name  = "MENA360 API";
        $ch     = curl_init();
        $url    = 'http://menavip.com/client/apifulfilment/';
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $ERPdata.'&erpuser='.$this->_userName.'&erppassword='.$this->_password.'&merchant_name='.$this->_userName);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        $decoded_response = json_decode($response, true);

        // validate response
        if(!is_array($decoded_response)){
            return json_encode($response);
        }
        if ($decoded_response['tracking_no'] != '0') {
            return json_encode($decoded_response);
        }
	}
}

?>