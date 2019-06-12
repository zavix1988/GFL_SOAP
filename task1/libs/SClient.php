<?php
class SClient implements iSOAP
{
    private $soapService;


    public function __construct($wsdl)
    {
        $this->soapService = new SoapClient($wsdl);
    }

    public function ListOfCurrenciesByCode(){
        $result = $this->soapService->ListOfCurrenciesByCode()->ListOfCurrenciesByCodeResult->tCurrency;
        array_shift($result);
        return $result;
    }
    public function LanguageName($name){
        return $this->soapService->LanguageName(['sISOCode' => $name]);
    }
        

}
