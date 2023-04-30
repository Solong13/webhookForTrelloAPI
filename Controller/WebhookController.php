<?php
include '../core/init.php';

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_setup_errors', 1);


    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

$last_webhook_id = file_get_contents('last_webhook_id.txt');
if (isset($_SERVER['HTTP_X_TRELLO_WEBHOOK']) && $_SERVER['HTTP_X_TRELLO_WEBHOOK'] === $last_webhook_id) {
    // This webhook has already been processed
    die();
}

handleWebhook($input);
file_put_contents('last_webhook_id.txt', $_SERVER['HTTP_X_TRELLO_WEBHOOK']);


function handleWebhook($input) {
    if(!empty($input)) {
        $data = json_decode($input, true);
        file_put_contents('log_Trello.txt', print_r($data, true), FILE_APPEND);

        $list_before = $data['action']['data']['listBefore']['name'];
        $list_after = $data['action']['data']['listAfter']['name'];
        $cardName = $data['action']['data']['card']['name'];
        $board_name = $data['action']['data']['board']['name'];

        if (isset($data['action']) && $data['action']['type'] === 'updateCard' &&
            isset($data['action']['data']['listBefore']) && isset($data['action']['data']['listAfter'])) {

            if ($list_before === 'InProgress' && $list_after === 'Done') {
                $message = "Card '$cardName' was moved from 'InProgress' to 'Done' на дошці $board_name";
            } else if ($list_before === 'Done' && $list_after === 'InProgress') {
                $message = "Card $cardName was moved from 'Done' to 'InProgress' на дошці $board_name";
            } else {
                $message = null;
            }

            if ($message !== null) {
                $send_data = [
                    'chat_id' => '-978520636',
                    'text' => $message
                ];
                 sendTelegram('sendMessage', $send_data);
            }
        }
    }
}

function sendTelegram($method, $data, $headers = []) {
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_POST => 1,
        CURLOPT_HEADER => 0,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'https://api.telegram.org/bot' . TG_TOKEN . '/' . $method,
        CURLOPT_POSTFIELDS => json_encode($data),
        CURLOPT_HTTPHEADER => array_merge(array("Content-Type: application/json"), $headers)
    ]);
    $result = curl_exec($curl);
    curl_close($curl);
    //return (json_decode($result, 1) ? json_decode($result, 1) : $result);
}

