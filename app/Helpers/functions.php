<?php

/**
 * Return Json
 */
if ( !function_exists('typeJson'))
{
    function typeJson($array)
    {
       return json_decode(json_encode($array, FALSE));
    }
}

/**
 * returns the location (ipinfo\ipinfo\IPinfo)
 *
 */


if ( !function_exists('ipLocation'))
{
    function ipLocation($return='string')
    {
        (env('IP_PRODUCTION') == true ? $ip = $_SERVER['REMOTE_ADDR'] : $ip = null);
        ($ip == '127.0.0.1' ? $details = constLang('access_local') : $details = '');
        if ($ip != '127.0.0.1') {
            try {
                $client   =  new \ipinfo\ipinfo\IPinfo(env('TOKEN_IPINFO'));
                $location =  $client->getDetails($ip);
                if ($return == 'json') {
                    return typeJson($location->all);
                } elseif ($return == 'string') {
                    foreach ($location->all as $key => $value) {
                        $details .= "{$key}:{$value}, ";
                    }

                    return substr($details, 0, -2);
                }
            } catch(\Exception $e){

                return false;
            }
        }
    }
}