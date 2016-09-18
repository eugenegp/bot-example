<?php
// Load composer
require __DIR__ . '/vendor/autoload.php';

$API_KEY = $_SERVER['BOT_API_KEY'] ?? '';
$BOT_NAME = 'pdd_coach_bot';
$hook_url = trim(file_get_contents(__DIR__ . '/url.txt')) . '/' . $API_KEY;
try {
    // Create Telegram API object
    $telegram = new Longman\TelegramBot\Telegram($API_KEY, $BOT_NAME);

    // Set webhook
    $result = $telegram->setWebHook($hook_url);
    if ($result->isOk()) {
        echo $result->getDescription();
    }
} catch (Longman\TelegramBot\Exception\TelegramException $e) {
    echo $e;
}