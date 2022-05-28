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
        $data->district = 'Brás';
        $data->city = 'São Paulo';
        $data->state = 'SP';
        $data->whatsapp = '11 2081-4360';
        $data->department = 'Vendas';
        $data->logo = 'https://tnwjeans.avdesign.com.br/img/logo-tnwjeans-2.png';
        $data->message_whatsapp = 'Oi, visitei o site da TNW! Gostaria de mais informações sobre:';
        $data->api_url = 'https://appwebcatalogo.vesti.mobi/catalogo/tnw';
        $data->copyright = 'Copyright© 2008 / '.date('Y').', TNW JEANS. todos os direitos reservados. By';        
        $data->horary = new \stdClass();
        $data->horary->weekday = 'SEG À SEX DAS 8H ÀS 17H:30';
        $data->horary->saturday = 'SÁBADO DAS 7H:30 ÀS 12H:30';
    
        return $data;
    }
}