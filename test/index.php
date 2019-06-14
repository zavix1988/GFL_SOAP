<?php
header("Content-Type: text/xml; charset=utf-8");
$file = file_get_contents('doc.wsdl');

echo $file;