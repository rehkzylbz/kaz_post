<?php

ini_set('display_errors', '1');
error_reporting(E_ALL);
/*use Kazpost\Tracking;

function class_loader($classname) {
    $path = str_replace('\\', DIRECTORY_SEPARATOR, $classname);
    include_once 'app/'.$path . '.php';
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
$data['track_number'] = 'RK070333447CN';
if (empty($data['track_number'])) {
    $answer['error'] = 'Отправленные данные пусты';
} 
if ($answer['error'] !== '') {
    echo json_encode($answer);
    die();
}
$tracking = Tracking::build(API_NAME);
$answer['data'] = $tracking->get_track($data['track_number']);
echo'<pre>';var_dump($answer);echo'</pre>';*/
//die();

include_once 'app/views/v_index.php';
