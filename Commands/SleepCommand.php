<?php

namespace Longman\TelegramBot\Commands\AdminCommands;

use Longman\TelegramBot\Commands\AdminCommand;
use Longman\TelegramBot\Request;

class SleepCommand extends AdminCommand
{
    protected $name = 'sleep';
    protected $description = 'A command for test';
    protected $usage = '/sleep';
    protected $version = '1.0.0';

    public function execute()
    {
        $message = $this->getMessage();
        $chat_id = $message->getChat()->getId();

        $now = time();
        $bDate = strtotime("2020-01-11");
        $dateDiff = $now - $bDate;
        $daysDiff = round($dateDiff / (60 * 60 * 24));

        if ((int) date('G', $now) < 4) {
            $daysDiff -= 1;
        }

        $text = "Сегодня я хочу спасть с ";
        $text .= $daysDiff % 2 == 0 ? "Ирочкой 🦄" : "Семочкой 🐁";

        $data = [
            'chat_id' => $chat_id,
            'text'    => $text,
        ];

        return Request::sendMessage($data);
    }
}