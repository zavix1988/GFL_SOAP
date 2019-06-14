<?php

require 'libs/TestClass.php';

new TestClass;

$server = new SoapServer('doc.wsdl');
$server->setClass('TestClass');
$server->handle();