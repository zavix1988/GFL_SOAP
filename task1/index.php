<?php
require 'libs/iSOAP.php';
require 'libs/SClient.php';
require 'libs/CurlClient.php';
require 'config.php';

$client = new SClient(SOAPServ);

$response = $client->ListOfCurrenciesByCode();

$client = new CurlClient(SOAPServ);
$response = $client->ListOfCurrenciesByCode();
//$response = $client->LanguageName('UKR');

var_dump($response);

/* foreach($response as $item){
    var_dump($item);
}

 */