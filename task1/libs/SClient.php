<?php
class SClient implements iSOAP
{
    private $soapService;


    public function __construct($wsdl)
    {
        $this->soapService = new SoapClient($wsdl);
    }

    public function ListOfCurrenciesByCode(){
        return $this->soapService->ListOfCurrenciesByCode()->ListOfCurrenciesByCodeResult->tCurrency;
    }
    public function LanguageName($name){
        return $this->soapService->LanguageName(['sISOCode' => $name]);
    }
        

}
