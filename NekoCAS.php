<?php
/**
 * NekoCAS.php
 *
 * Created in 2020/4/10 6:44 下午
 * Created by johnwu
 */


namespace NekoCAS;

class NekoCAS
{
    private static $secret;
    private static $domain;

    public static function init($domain, $secret)
    {
        self::setDomain($domain);
        self::setSecret($secret);
    }

    public static function setSecret($secret)
    {
        self::$secret = $secret;
    }

    public static function setDomain($domain)
    {
        self::$domain = $domain;
    }

    public static function validate($ticket)
    {
        $query = http_build_query(array('service' => self::$secret, 'ticket' => $ticket));

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::$domain . '/validate?' . $query);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);

        $response = json_decode($output, true);

        if (is_null($response) || $response['success'] !== true) {
            return new NekoCASResponse();
        }

        return new NekoCASResponse(
            $response['success'],
            $response['data']['name'],
            $response['data']['email'],
            $response['data']['token'],
            $response['message']
        );
    }
}
