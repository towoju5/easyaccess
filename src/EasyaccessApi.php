<?php

namespace Towoju5\EasyaccessApi;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Http;

class EasyaccessApi
{
    public function __construct()
    {
        //
    }

    public function waec($qty = 1)
    {
        $allowedQty = [1, 2, 3, 4, 5, 10];
        if (!in_array($qty, $allowedQty)) {
            $qty = 1;
        }
        $result = self::process('waec_v2.php', 'POST', ['no_of_pins' => $qty]);
        return $result;
    }

    public function neco($qty = 1)
    {
        $allowedQty = [1, 2, 3, 4, 5, 10];
        if (!in_array($qty, $allowedQty)) {
            $qty = 1;
        }
        $result = self::process('neco_v2.php', 'POST', ['no_of_pins' => $qty]);
        return $result;
    }

    public function nabteb_v2($qty = 1)
    {
        $allowedQty = [1, 2, 3, 4, 5, 10];
        if (!in_array($qty, $allowedQty)) {
            $qty = 1;
        }
        $result = self::process('neco_v2.php', 'POST', ['no_of_pins' => $qty]);
        return $result;
    }

    public function nbais_v2($qty = 1)
    {
        $allowedQty = [1, 2, 3, 4, 5, 10];
        if (!in_array($qty, $allowedQty)) {
            $qty = 1;
        }
        $result = self::process('neco_v2.php', 'POST', ['no_of_pins' => $qty]);
        return $result;
    }

    public function data($data = [])
    {
        $result = self::process('data.php', 'POST', $data);
        return $result;
    }

    public function airtime($data = [])
    {
        $result = self::process('airtime.php', 'POST', $data);
        return $result;
    }

    public function query_transaction($data = '')
    {
        $result = self::process('query_transaction.php', 'POST', ['reference' => $data]);
        return $result;
    }

    public function verifytv($data = [])
    {
        $result = self::process('verifytv.php', 'POST', $data);
        return $result;
    }

    public function paytv($data = [])
    {
        $result = self::process('paytv.php', 'POST', ['reference' => $data]);
        return $result;
    }

    public function verifyelectricity($data = [])
    {
        $result = self::process('verifyelectricity.php', 'POST', ['reference' => $data]);
        return $result;
    }

    public function payelectricity($data = [])
    {
        $result = self::process('payelectricity.php', 'POST', ['reference' => $data]);
        return $result;
    }

    private static function process($endpoint, $method, array $data = [])
    {
        $auth_token = getenv("EASYACCESS_API");
        $url = "https://easyaccess.com.ng/api/$endpoint";
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array(
                "AuthorizationToken: $auth_token", //replace this with your authorization_token
                "cache-control: no-cache"
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response);
    }
}
