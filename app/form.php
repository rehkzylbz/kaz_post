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
$api_config = parse_ini_file('config/api.ini', true, INI_SCANNER_RAW);
if (empty($data)) {
    $answer['error'] = 'Отправленные данные пусты';
} 
if ($answer['error'] !== '') {
    echo json_encode($answer);
    die();
}
$tracking = Tracking::build(API_NAME, $api_config[API_NAME]);
$answer['data'] = $tracking->get_track($data);
echo json_encode($answer);