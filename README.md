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
##### Initialize the SDK #####

```
#!php

<?php
require 'vendor/autoload.php';
$fetchr = new \fetchr\php_sdk\Shiphappy("CLIENT_USERNAME","CLIENT_PASSWORD");
```

### If you have any concerns or questions, you can contact us on: ###
* tech@fetchr.us