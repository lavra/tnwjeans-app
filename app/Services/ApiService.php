<?php
/**
 * Created by AV Design.
 * User: Anselmo Velame
 * Date: 03/02/20
 * Time: 11:06
 */

namespace App\Services;

use App\Services\Traits\ApiTrait;
use App\Services\Traits\CompanyTrait;


class ApiService
{
    use ApiTrait, CompanyTrait;

    public function getUrl($url)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            return null;
            //dd("cURL Error #:" . $err);
        } else {
            return json_decode($response);
        }
    }

    public function postUrl($url)
    {
        $url = 'https://api.insta-stories.ru/posts';
        $data =  [
            "maxId" => "2355422582513466879_286341336",
            "pk" => "286341336",
            "x-trip" => "3gm4ada1de",
            "input" => "tnwjeans"
        ];

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array(
            // Set here requred headers
                "accept: */*",
                "accept-language: en-US,en;q=0.8",
                "content-type: application/json",
            )

        ));

        $response = curl_exec($curl);

        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            dd("cURL Error #:" . $err);
        } else {
            dd($response);
        }
    }

}