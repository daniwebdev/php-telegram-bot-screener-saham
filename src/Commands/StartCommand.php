<?php
namespace DANIWEBDEV\BotTelegramStockScreener\Commands;

class StartCommand extends \Longman\TelegramBot\Commands\SystemCommand {

    protected $name = 'start';
    protected $description = "Start Command";
    protected $usage = '/start';


    public function execute(): \Longman\TelegramBot\Entities\ServerResponse {
        

        return $this->replyToChat("Hi!, silahkan gunakan /screener untuk melakukan filter saham");
    }
}