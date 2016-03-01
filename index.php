<?php 
require_once "vendor/autoload.php";

$fetchr = new \fetchr\php_sdk\Shiphappy('apifulfilment','apifulfilment');

// echo $fetchr->getBulkStatus(array('1606109430583', '1610199431176'));
//echo $fetchr->getOrderStatus('1606109430583');
// $dataErp = 	array(
//                 'username' => 'dummy',
//                 'password' => '123456789',
//                 'method' => 'create_orders',
//                 'pickup_location' => 'bab el dar',
//                 'data' => array(
//                     array(
//                         'order_reference' => 'dummy_100000564',
//                         'name' => 'islamz islam',
//                         'email' => 'i.khalil@fetchr.us',
//                         'phone_number' => '222222222',
//                         'address' => '3abdoan',
//                         'city' => 'el madeeneh el fadelah',
//                         'payment_type' => 'COD',
//                         'amount' => '6',//$grandtotal,
//                         'description' => 'No',
//                         'comments' => 'Dummy comment',
//                     ),
//                 ),
//             );

$dataErp[] = 	array(
          		'order' => array(
                    'items' => array(
                        '0' => array(
                            'client_ref' => '100000566',
                            'name' => 'asdasd',
                            'sku' => 'dk1',
                            'quantity' => '1',
                            'merchant_details' => array(
                                    'mobile' => '',
                                    'phone' => '',
                                    'name' => 'Main Website Store',
                                    'address' => ''
                                ),

                            'COD' => '5',
                            'price' => '1',
                            'is_voucher' => 'No',
                        )
                    ),
                    'details' => array(
                        'status' => '',
                        'discount' => '10',
                        'grand_total' => '500',//$grandtotal,
                        'customer_email' => 'koko@kopww.com',
                        'order_id' => 'paisada_303030303',
                        'customer_firstname' => 'helloz',
                        'payment_method' => 'COD',
                        'customer_mobile' => '9292929',
                        'customer_lastname' => 'hiiiz',
                        'order_country' => 'JO',
                        'order_address' => 'batata, Amman, JO',
                    ),
                )
	);
// print_r($dataErp);die("sc");
echo $fetchr->createFulfilmentOrder($dataErp);
?>