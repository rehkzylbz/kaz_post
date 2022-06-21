<?php

namespace Kazpost;

/**
 * Description of V2
 *
 * @author Aleksej/rehkzylbz@yandex.ru
 */
class v2 extends Tracking {

    /**
     * get track data from api
     * @param type $track_number requested track number 
     * @return array formatted tracking api response, keys: send_time, status, error
     */
    public function get_track(string $track_number = ''): array {
        $response = $this->get_response($track_number);
        $answer = $this->format_response($response);
        return $answer;
    }

}