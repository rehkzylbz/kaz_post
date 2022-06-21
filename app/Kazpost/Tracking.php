<?php

namespace Kazpost;

/**
 * absctract class Tracking
 *
 * @author Aleksej/rehkzylbz@yandex.ru
 */
abstract class Tracking implements ITracking {

    protected $_api_url = '';
    protected $_settings = [];

    /**
     * instance api concrete api version 
     * @param string $api_name classname for api version
     * @param array $api_config api version options array, keys: url, settings
     * @return Tracking concrete api version object
     */
    public static function build(string $api_name = '', array $api_config = []): Tracking {
        $classname = 'Kazpost\\' . $api_name;
        $tracking = new $classname;
        if (isset($api_config['api_url'])) {
            $tracking->_api_url = $api_config['api_url'];
        }
        if (isset($api_config['settings'])) {
            $tracking->_settings = $api_config['settings'];
        }
        return $tracking;
    }

    /**
     * get track data from api
     * @param type $track_number requested track number 
     * @return array formatted tracking api response, keys: type, send_time, status, error
     */
    public abstract function get_track(string $track_number = ''): array;
    
    /**
     * set request url for concrete endpoint
     * @param string $track_number track number to send
     * @return string request url
     */
    protected function set_request_url(string $track_number = ''): string {
        return '';
    }

    /**
     * get response from api
     * @param string $request_url formed api endpoint url
     * @return array api response
     */
    protected function get_response(string $request_url = ''): array {
        return [];
    }

    /**
     * translate response data to uniform format
     * @param string $response api response json to format
     * @return array formatted response, keys: type, send_time, status, error
     */
    protected function format_response(array $response): array {
        return [];
    }
}
