<?php

namespace Kazpost;

/**
 * Interface for Tracking
 *
 * @author Aleksej/rehkzylbz@yandex.ru
 */
interface ITracking {

    /**
     * 
     * @param string $track_number requested track number
     * @return array formatted tracking api response, keys: type, send_time, status, error
     */
    public function get_track(string $track_number): array;
}