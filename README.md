# README #

### Brief Introduction ###
Fetchr PHP/SDK enables PHP developers to use Fetchr shipping and tracking APIs in their code.

### Requirements ###
1. PHP >= 5.3.0
2. curl enabled
 
### Installation ###
You can install this package via Composer by adding this package in the require section

```
"require": {
    "fetchr/php-sdk": "1.0.0"
}

```

### Getting Started ###

***Initialize the SDK***
```
#!php

<?php
require 'vendor/autoload.php';
$fetchr = new \fetchr\php_sdk\Shiphappy("CLIENT_USERNAME","CLIENT_PASSWORD");
```
***Get Order Status***

```
#!php

$fetchr->getOrderStatus('TRACKING_ID');
```
***Get Orders Bulk Statuses***

```
#!php

$fetchr->getBulkStatus(array('TRACKING_ID_1', 'TRACKING_ID_2'));
```
*Note: you can add as much tracking orders as you like in the array

***Create Delivery Orders***

```

#!php

<?php
$dataErp = array(
            'username' => 'CLIENT_USERNAME', // Provided by Fetchr Account Manager
            'password' => 'CLIENT_PASSWORD', // Provided by Fetchr Account Manager
            'method' => 'create_orders',
            'pickup_location' => 'CLIENT_STORE_ADDRESS', // Your Store Address
            'data' => array(
                array(
                    'order_reference' => 'CLIENT_USERNAME'.'_'.'ORDER_ID',
                    'name' => 'CUSTOMER_FIRST_NAME'.' '.'CUSTOMER_LAST_NAME',
                    'email' => 'CUSTOMER_EMAIL',
                    'phone_number' => ('CUSTOMER_PHONE'?'CUSTOMER_PHONE':'N/A'),
                    'address' => 'CUSTOMER_ADDRESS',
                    'city' => CUSTOMER_CITY,
                    'payment_type' => PAYMENT_TYPE, // If cash on delivery then COD otherwise CD 
                    'amount' => 'GRAND_TOTAL',// If the payment type was credit card then it must be 0 else put the real value of the total,
                    'description' => 'DESCRIPTION',
                    'comments' => 'COMMENTS',
                ),
            ),
        );

$fetchr->createDeliveryOrder($dataErp);
```
*Note : all the capital-case words must be replaced with variables

### If you have any concerns or questions, you can contact us on: ###
* tech@fetchr.us