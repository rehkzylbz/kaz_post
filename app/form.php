<?php
use Kazpost\Tracking;

function class_loader($classname) {
    $path = str_replace('\\', DIRECTORY_SEPARATOR, $classname);
    include_once $path . '.php';
}

spl_autoload_register('class_loader');

CONST API_NAME = 'v2';
$answer = [
    'error' => '',
    'data' => [
    ]
];
$data_filters = [
    'track_number' => FILTER_SANITIZE_SPECIAL_CHARS
];
$data = filter_input_array(INPUT_POST, $data_filters);
if (empty($data['track_number'])) {
    $answer['error'] = 'Отправленные данные пусты';
} 
if ($answer['error'] !== '') {
    echo json_encode($answer);
    die();
}
$api_config = parse_ini_file('config/api.ini', true, INI_SCANNER_RAW);
$tracking = Tracking::build(API_NAME, $api_config[API_NAME]);
$answer['data'] = $tracking->get_track($data['track_number']);
echo json_encode($answer);