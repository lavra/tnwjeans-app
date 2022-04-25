<?php
    
    
namespace App\Services\Traits;


trait CompanyTrait
{
    function dataCompany()
    {
        $data = new \stdClass();
        $data->name = 'TNW JEANS - FABRICA E COMERCIO DE JEANS';
        $data->fantasy = 'TNW JEANS';
        $data->phone = '11 2081-4360';
        $data->address = 'Rua Xavantes, 596';
        $data->district = 'Br�s';
        $data->city = 'S�o Paulo';
        $data->state = 'SP';
        $data->whatsapp = '11 99995-5939';
        $data->department = 'Vendas';
        $data->logo = 'https://tnwjeans.avdesign.com.br/img/logo-tnwjeans-2.png';
        $data->message_whatsapp = 'Oi, visitei o site da TNW! Gostaria de mais informa��es sobre:';
        $data->api_url = 'https://appwebcatalogo.vesti.mobi/catalogo/tnw';
        $data->copyright = 'Copyright� 2008 / '.date('Y').', TNW JEANS. todos os direitos reservados. By';        
        $data->horary = new \stdClass();
        $data->horary->weekday = 'SEG � SEX DAS 8H �S 17H:30';
        $data->horary->saturday = 'S�BADO DAS 8H �S 12H';
    
        return $data;
    }
}