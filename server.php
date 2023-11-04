<?php
require './vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


$bot_api_key  = $_ENV['TELEGRAM_BOT_TOKEN'];
$bot_username = $_ENV['TELEGRAM_BOT_USERNAME'];

try {
    
    $telegram = new Longman\TelegramBot\Telegram($bot_api_key, $bot_username);

    $telegram->addCommandClass(\DANIWEBDEV\BotTelegramStockScreener\Commands\StartCommand::class);
    $telegram->addCommandClass(\DANIWEBDEV\BotTelegramStockScreener\Commands\ScreenerCommand::class);

    $telegram->useGetUpdatesWithoutDatabase();

    while(true) {
        $updates = $telegram->handleGetUpdates();

        $result = $updates->getRawData();
    

        sleep(3);
    }

} catch (\Throwable $th) {

    echo $th->getMessage();

}

