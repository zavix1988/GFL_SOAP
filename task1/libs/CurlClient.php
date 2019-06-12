<?php
class CurlClient implements iSOAP
{
    private $soapService;
    private $soapUrl;

    public function __construct($wsdl)
    {
        $this->soapUrl = $wsdl;
    }

    public function ListOfCurrenciesByCode(){

        $xml_post_string = '<?xml version="1.0" encoding="utf-8"?>
        <soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
          <soap:Body>
            <ListOfCurrenciesByCode xmlns="http://www.oorsprong.org/websamples.countryinfo">
            </ListOfCurrenciesByCode>
          </soap:Body>
        </soap:Envelope>';

        $headers = [
            'POST /websamples.countryinfo/CountryInfoService.wso HTTP/1.1',
            'Host: webservices.oorsprong.org',
            'Content-Type: text/xml; charset=utf-8',
            'Content-Length: '.strlen($xml_post_string)  
        ];

        $this->soapService = curl_init();

        curl_setopt($this->soapService,CURLOPT_URL,$this->soapUrl);
        curl_setopt($this->soapService, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->soapService, CURLOPT_TIMEOUT, 10);
        curl_setopt($this->soapService, CURLOPT_POST, true);
        curl_setopt($this->soapService, CURLOPT_POSTFIELDS, $xml_post_string); // the SOAP request
        curl_setopt($this->soapService, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($this->soapService); 
        curl_close($this->soapService);

        $xmlObj = simplexml_load_string($response);
        $xmlObj->registerXPathNamespace('m', 'http://www.oorsprong.org/websamples.countryinfo');
        $sISOCode = $xmlObj->xpath('//m:sISOCode');
        $sName = $xmlObj->xpath('//m:sName');
        for ($i = 0; $i < count($sISOCode); $i++){
            $result[] = ['sISOCode' => (string)$sISOCode[$i], 'sName' => (string)$sName[$i]];
        }
        array_shift($result);

        return $result;
        
    }
    public function LanguageName($name){

        $xml_post_string = '<?xml version="1.0" encoding="utf-8"?>
        <soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
          <soap:Body>
            <LanguageName xmlns="http://www.oorsprong.org/websamples.countryinfo">
              <sISOCode>'.$name.'</sISOCode>
            </LanguageName>
          </soap:Body>
        </soap:Envelope>';

        $headers = [
            'POST /websamples.countryinfo/CountryInfoService.wso HTTP/1.1',
            'Host: webservices.oorsprong.org',
            'Content-Type: text/xml; charset=utf-8',
            'Content-Length: '.strlen($xml_post_string)  
        ];

        $this->soapService = curl_init();

        curl_setopt($this->soapService,CURLOPT_URL,$this->soapUrl);
        curl_setopt($this->soapService, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->soapService, CURLOPT_TIMEOUT, 10);
        curl_setopt($this->soapService, CURLOPT_POST, true);
        curl_setopt($this->soapService, CURLOPT_POSTFIELDS, $xml_post_string); // the SOAP request
        curl_setopt($this->soapService, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($this->soapService); 
        curl_close($this->soapService);

        $xmlObj = simplexml_load_string($response);
        $xmlObj->registerXPathNamespace('m', 'http://www.oorsprong.org/websamples.countryinfo');
        $result = $xmlObj->xpath('//m:LanguageNameResult');

        return (string)$result[0];
    }
        

}
