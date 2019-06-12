<?php
require 'libs/iSOAP.php';
require 'libs/SClient.php';
require 'libs/CurlClient.php';
require 'config.php';

$soapClient = new SClient(SOAPServ);

$scCountries = $soapClient->ListOfCurrenciesByCode();
$scLanguage = $soapClient->LanguageName(ISO_CODE);

$curlClient = new CurlClient(SOAPServ);

$curlCountries = $curlClient->ListOfCurrenciesByCode();
$curlLanguage = $curlClient->LanguageName(ISO_CODE);

require 'templates/template.inc.php';