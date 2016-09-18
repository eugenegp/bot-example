<?php
declare(strict_types = 1);

// Load composer
define('ROOT_PATH', __DIR__ . '/..');
require ROOT_PATH. '/vendor/autoload.php';

$API_KEY = $_SERVER['BOT_API_KEY'] ?? '';
$BOT_NAME = 'pdd_coach_bot';
try {
    // Create Telegram API object
    $telegram = new Longman\TelegramBot\Telegram($API_KEY, $BOT_NAME);
    

    // Handle telegram webhook request
    \Bot\Bootstrap::setup($telegram);
    $telegram->handle();
} catch (Longman\TelegramBot\Exception\TelegramException $e) {
    // Silence is golden!
    // log telegram errors
    echo $e;
} catch (\Throwable $e) {
    echo $e;
}