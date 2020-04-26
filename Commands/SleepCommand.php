<?php

namespace Longman\TelegramBot\Commands\UserCommands;

use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Request;

class SleepCommand extends UserCommand
{
    protected $name = 'sleep';
    protected $description = 'A command for test';
    protected $usage = '/sleep';
    protected $version = '1.0.0';

    public function execute()
    {
        date_default_timezone_set("Europe/Moscow");

        $message = $this->getMessage();
        $chat_id = $message->getChat()->getId();

        $now = time();
        $bDate = strtotime("2020-01-11");
        $dateDiff = $now - $bDate;
        $daysDiff = round($dateDiff / (60 * 60 * 24));

        $text = "Сегодня я хочу спасть с ";
        $text .= $daysDiff % 2 == 0 ? "Ирочкой 🦄" : "Семочкой 🐁";

        $data = [
            'chat_id' => $chat_id,
            'text'    => $text,
        ];

        return Request::sendMessage($data);
    }
}