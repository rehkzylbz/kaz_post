<?php

namespace Kazpost;

/**
 * class for api v2 tracking implementation
 *
 * @author Aleksej/rehkzylbz@yandex.ru
 */
class v2 extends Tracking {

    /**
     * get track data from api
     * @param type $track_number requested track number 
     * @return array formatted tracking api response, keys: type, send_time, status, error
     */
    public function get_track(string $track_number = ''): array {
        $request_url = $this->set_request_url($track_number, 'track');
        $response = $this->get_response($request_url);
        $answer = $this->format_response($response);
        return $answer;
    }

    /**
     * set request url for concrete endpoint
     * @param string $track_number track number to send
     * @return string request url
     */
    protected function set_request_url(string $track_number = '', string $endpoint = ''): string {
        switch ($endpoint) {
            case 'track':
                $request_url = $this->_api_url . $track_number;
                break;
            case 'history':
                $request_url = $this->_api_url . $track_number . $this->_settings['history_suffix'];
                break;
            default:
                $request_url = $this->_api_url . $track_number;
                break;
        }
        return $request_url;
    }

    /**
     * get response from api
     * @param string $request_url formed api endpoint url
     * @return array api response
     */
    protected function get_response(string $request_url = ''): array {
        $curl_handler = curl_init();
        $response = CURL::send_get_request($curl_handler, $request_url);
        curl_close($curl_handler);
        return $response;
    }

    /**
     * translate response data to uniform format
     * @param string $response api response json to format
     * @return array formatted response, keys: type, send_time, status, error
     */
    protected function format_response(array $response): array {
        $response_data = json_decode($response['data'], true);
        if ($response['error'] !== '') {
            $response_formatted = [
                'error' => $response['error']
            ];
        } elseif (!empty($response_data['error'])) {
            $response_formatted = [
                'error' => $response_data['error']
            ];
        } else {
            $response_formatted = [
                'type' => !empty($response_data['package_type']) ? $response_data['package_type'] . ' ' . $response_data['category'] : 'Не указан',
                'status' => !empty($response_data['status']) ? $response_data['status'] : 'Не указан',
                'send_time' => !empty($response_data['last']['date']) ? date('H:i d-m-Y', strtotime($response_data['last']['date'])) : 'Не указана'
            ];
        }
        return $response_formatted;
    }

}
