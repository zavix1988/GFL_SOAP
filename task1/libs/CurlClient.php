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

        $response = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $response);
        $xml = new SimpleXMLElement($response);
        return $xml->soapBody->mListOfCurrenciesByCodeResponse->mListOfCurrenciesByCodeResult;
        
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
        return $response;
    }
        

}
