<?php

namespace Kazpost;

/**
 * Class for CURL actions
 *
 * @author Aleksej/rehkzylbz@yandex.ru
 */
class CURL {

    /**
     * send get request
     * @param type $curl_handler curl handler from curl_init()
     * @param array $data get data to send
     * @param string $url target endpoint url
     * @return array response from target endpoint, keys: error, data 
     */
    public static function send_get_request($curl_handler, string $request_url = ''): array {
        $options = array(
            CURLOPT_URL => $request_url,
            CURLOPT_RETURNTRANSFER => 1,
        );
        $response = self::send_request($curl_handler, $options);
        return $response;
    }

    /**
     * send curl request
     * @param type $curl_handler curl handler from curl_init()
     * @param array $options options for curl_setopt
     * @return array response from request exec, keys: error, data
     */
    private static function send_request($curl_handler, array $options = []): array {
        curl_setopt_array($curl_handler, $options);
        $response = [
            'error' => '',
            'data' => ''
        ];
        if (($response['data'] = curl_exec($curl_handler)) === false) {
            $response['error'] = curl_error($curl_handler);
        }
        return $response;
    }

}
