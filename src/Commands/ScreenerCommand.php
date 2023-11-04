<?php
namespace DANIWEBDEV\BotTelegramStockScreener\Commands;

use \GOAPI\IO\Resources\Stock\StockIndicator;

class ScreenerCommand extends \Longman\TelegramBot\Commands\SystemCommand {

    protected $name = 'screener';
    protected $description = "Screener Command";
    protected $usage = '/screener';


    public function execute(): \Longman\TelegramBot\Entities\ServerResponse {
        
        $message = $this->getMessage();

        $script  = $message->getText(true);

        $results = implode("\n", $this->screener($script));

        return $this->replyToChat($results);
    }

    public function screener($script) {
        $client = new \GOAPI\IO\Client(['api_key' => $_ENV['GOAPI_API_KEY']]);
        $stocks = $client->createStockIDX();


        $indicators = [];

        for($page = 1; $page <= 1; $page++) {
            $indicators = array_merge($indicators, $stocks->getStockIndicators($page)->values());
        }

        print_r($script.PHP_EOL);


        $results = (new \GOAPI\IO\Collection($indicators))
        ->filter(function(StockIndicator $indicator) use ($script) {
            /* init variable */
                $open = $indicator->open;
                $high = $indicator->high;
                $low = $indicator->low;
                $close = $indicator->close;
                $volume = $indicator->volume;
                $Prev1Open = $indicator->Prev1Open;
                $Prev2Open = $indicator->Prev2Open;
                $Prev3Open = $indicator->Prev3Open;
                $Prev4Open = $indicator->Prev4Open;
                $Prev5Open = $indicator->Prev5Open;
                $Prev1Close = $indicator->Prev1Close;
                $Prev2Close = $indicator->Prev2Close;
                $Prev3Close = $indicator->Prev3Close;
                $Prev4Close = $indicator->Prev4Close;
                $Prev5Close = $indicator->Prev5Close;
                $Prev1High = $indicator->Prev1High;
                $Prev2High = $indicator->Prev2High;
                $Prev3High = $indicator->Prev3High;
                $Prev4High = $indicator->Prev4High;
                $Prev5High = $indicator->Prev5High;
                $Prev1Low = $indicator->Prev1Low;
                $Prev2Low = $indicator->Prev2Low;
                $Prev3Low = $indicator->Prev3Low;
                $Prev4Low = $indicator->Prev4Low;
                $Prev5Low = $indicator->Prev5Low;
                $change = $indicator->change;
                $changePct = $indicator->change;
                $MA10 = $indicator->MA10;
                $MA20 = $indicator->MA20;
                $MA50 = $indicator->MA50;
                $MA200 = $indicator->MA200;
                $EMA10 = $indicator->EMA10;
                $EMA20 = $indicator->EMA20;
                $EMA50 = $indicator->EMA50;
                $EMA200 = $indicator->EMA200;
                $RSI = $indicator->RSI;
                $Day20MA = $indicator->Day20MA;
                $Upper = $indicator->Upper;
                $Lower = $indicator->Lower;
                $Day12EMA = $indicator->Day12EMA;
                $Day26EMA = $indicator->Day26EMA;
                $MACD = $indicator->MACD;
                $SignalLine = $indicator->SignalLine;
                $StochOSC = $indicator->StochOSC;
                $TR = $indicator->TR;
                $ATR = $indicator->ATR;
                $Day9High = $indicator->Day9High;
                $Day9Low = $indicator->Day9Low;
                $Day26High = $indicator->Day26High;
                $Day26Low = $indicator->Day26Low;
                $Day52High = $indicator->Day52High;
                $Day52Low = $indicator->Day52Low;
            /* end: init variable */


            try {
                
                return eval("return " . $script . ";");
            } catch (\Throwable $th) {
                // jika terjadi unmatching value ex: division by zero
                return false;
            }
            // return $indicator->MA20 > $indicator->MA200 && $indicator->StochOSC < 20;
        });
        

        return $results->map(function(StockIndicator $item) {
            return $item->symbol;
        })->values();
    }
}