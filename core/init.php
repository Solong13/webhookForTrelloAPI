<?php
//https://api.telegram.org/bot5628796296:AAGu5HwepHC2HCtn3GypxI0bCjMplhqAllw/deleteWebhook?url=https://test-oleksandr-kuzmenko.dev.yeducoders.com/index.php
define("TG_TOKEN", "5628796296:AAGu5HwepHC2HCtn3GypxI0bCjMplhqAllw");
define("TG_USER_ID", 951454643);// user

define("API_KEY", "3187388abba98c7c1c729802f3cf4029");
define("TRELLO_TOKEN", "ATTAd4a2c1f0a13233bafcb41beeb4c3904f9bcec28ef9eef0620561d304425ab8933B2E3841");
define("ID_BOARD", "644107bc84e24f54ffe6448e");
define("ID_GROUP", '-978520636');
//DB
$db_Name = 'dev_candidate_5';
$db_password = 'bGwRBLAyHR';
$db_host = 'localhost';

/*
POST https://api.trello.com/1/webhooks?token=ATTAd4a2c1f0a13233bafcb41beeb4c3904f9bcec28ef9eef0620561d304425ab8933B2E3841&key=3187388abba98c7c1c729802f3cf4029&callbackURL=https://test-oleksandr-kuzmenko.dev.yeducoders.com/Controller/WebhookController.php&idModel=644107bc84e24f54ffe6448e
token [{"key":"token","value":"ATTAd4a2c1f0a13233bafcb41beeb4c3904f9bcec28ef9eef0620561d304425ab8933B2E3841","equals":true,"description":null,"enabled":true}]
key [{"key":"key","value":"3187388abba98c7c1c729802f3cf4029","equals":true,"description":null,"enabled":true}]
callbackURL https://test-oleksandr-kuzmenko.dev.yeducoders.com/Controller/WebhookController.php
idModel 644107bc84e24f54ffe6448e
*/