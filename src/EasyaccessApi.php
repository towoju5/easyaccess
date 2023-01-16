<?php

namespace Towoju5\EasyaccessApi;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

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
        $result = self::process('verifytv.php', 'POST', ['reference' => $data]);
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
        $client = new Client();
        $headers = [
            "AuthorizationToken" => "Bearer $auth_token",
            "Content-Type"  => "application/json",
            "cache-control" => "no-cache"
        ];
        $data = [];
        $request = new Request($method, $url, $headers);
        $res = $client->sendAsync($request, $data)->wait();
        echo $res->getBody();
    }
}
