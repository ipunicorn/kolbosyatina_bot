<?php

// Load composer
require_once __DIR__ . '/vendor/autoload.php';

date_default_timezone_set("Europe/Moscow");

$env = Dotenv\Dotenv::createImmutable(__DIR__);
$env->load();

$botApiKey  = getenv("BOT_API_KEY");
$botUsername = getenv("BOT_USERNAME");

$commands_paths = [
    __DIR__ . '/Commands/',
];

try {
    $telegram = new Longman\TelegramBot\Telegram($botApiKey, $botUsername);

    $telegram->addCommandsPaths($commands_paths);

    $telegram->enableAdmins([
        211021342,
        196716767,
    ]);

    $telegram->enableLimiter();

    $telegram->handle();
} catch (Longman\TelegramBot\Exception\TelegramException $e) {
    Longman\TelegramBot\TelegramLog::error($e);
}
