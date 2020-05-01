<?php

namespace Longman\TelegramBot\Commands\UserCommands;

use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Request;
use Bot\Traits\AdminsTrait;

class SleepCommand extends UserCommand
{
    use AdminsTrait;

    protected $name = "sleep";
    protected $description = "A command for test";
    protected $usage = "/sleep";
    protected $version = "1.0.0";

    public function execute()
    {
        $message = $this->getMessage();
        $chatId = $message->getChat()->getId();
        $fromId = $message->getFrom()->getId();

        if (!$this->isAdmin($fromId)) {
            return Request::sendMessage([
                "chat_id" => $chatId,
                "text" => $this->accessDeniesMessage,
            ]);
        }


        $now = time();
        $bDate = strtotime("2020-01-11");
        $dateDiff = $now - $bDate;
        $daysDiff = round($dateDiff / (60 * 60 * 24));

        if ((int)date('G', $now) < 4) {
            $daysDiff -= 1;
        }

        $text = "Сегодня я хочу спасть с ";
        $text .= $daysDiff % 2 == 0 ? "Ирочкой 🦄" : "Семочкой 🐁";

        $data = [
            "chat_id" => $chatId,
            "text" => $text,
        ];

        return Request::sendMessage($data);
    }
}