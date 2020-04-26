<?php

require_once __DIR__ . '/vendor/autoload.php';

$botApiKey = getenv("BOT_API_KEY");
$botUsername = getenv("BOT_USERNAME");
$hook_url = getenv("HOOK_URL");

try {
    $telegram = new Longman\TelegramBot\Telegram($botApiKey, $botUsername);

    $result = $telegram->setWebhook($hook_url);

    if ($result->isOk()) {
        echo $result->getDescription();
    }
} catch (Longman\TelegramBot\Exception\TelegramException $e) {
    echo $e->getMessage();
}
