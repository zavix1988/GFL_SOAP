<?php
header("Content-Type: text/xml; charset=utf-8");
$wsdl = file_get_contents('wsdl/rules.wsdl');
echo $wsdl;