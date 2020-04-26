<?php

require_once __DIR__ . '/vendor/autoload.php';

$env = Dotenv\Dotenv::createImmutable(__DIR__);
$env->load();

$botApiKey = getenv("BOT_API_KEY");
$botUsername = getenv("BOT_USERNAME");

try {
    $telegram = new Longman\TelegramBot\Telegram($botApiKey, $botUsername);

    $result = $telegram->deleteWebhook();

    if ($result->isOk()) {
        echo $result->getDescription();
    }
} catch (Longman\TelegramBot\Exception\TelegramException $e) {
    echo $e->getMessage();
}
